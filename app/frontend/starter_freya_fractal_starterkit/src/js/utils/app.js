export function sleep(ms) {
    return new Promise((resolve) => {
        setTimeout(resolve, ms);
    });
}

// Register and init component
export function registerComponent(components) {
    // console.log('registerComponent');
    components.forEach((c) => {
        const $el = c.once ? document.querySelector(c.class) : document.querySelectorAll(c.class);
        // console.log(c.class);
        // console.dir($el);
        if ((!c.once && $el.length > 0) || (c.once && $el)) c.comp($el);
    });
}
