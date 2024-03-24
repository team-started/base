const fs = require('fs');
const fg = require('fast-glob');
const path = require('path');
const svgstore = require('svgstore');
const color = require('cli-color');
const { promisify } = require('util');
const { DIR, ICONS } = require('../settings');

const compilerName = 'svg-icons';
const spriteName = ICONS.spriteName;

const readFile = promisify(fs.readFile);
const exists = promisify(fs.exists);
const writeFile = promisify(fs.writeFile);

const config = {
    inputDir: path.join(DIR.icons),
    outputDir: path.join(DIR.assets),
    spriteName,
};

// https://github.com/svg/svgo
const options = {
    minifyStyles: true,
    removeUselessDefs: true,
    removeNonInheritableGroupAttrs: true,
    removeTitle: true,
    cleanupAttrs: true,
    removeMetadata: true,
    removeDoctype: true,
    removeXMLProcInst: true,
    collapseGroups: true,
};

const compile = async ({ inputDir, outputDir, spriteName }, options = {}) => {
    console.log(color.yellow(`${compilerName} generating...\n`));

    try {
        const sprites = svgstore(options);

        const icons = fg
            .sync([`${inputDir}/**/*.svg`, `!${spriteName}`, '!.DS_Store'])
            .map((icon) => path.basename(icon));

        for (const icon of icons) {
            const iconpath = path.join(inputDir, icon);
            const svgid = path.parse(icon).name;
            const code = await readFile(iconpath, { encoding: 'utf-8' });
            sprites.add(svgid, code);
            console.log(color.blue('✔ generated'), color.blueBright(svgid));
        }

        const outputSprite = path.join(outputDir, spriteName);
        await exists(path.resolve(outputDir));
        await writeFile(outputSprite, sprites.toString({ inline: !!options.inlineSvg }));

        console.log(color.green('Done'));
        console.log(color.blueBright(outputSprite));
    } catch (err) {
        console.log(color.red(`${compilerName} error`, err, '\n'));
        process.exit(1);
    }
};

compile(config, options);
