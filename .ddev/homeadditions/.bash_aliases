# To make this file active you can either
# cp bash_aliases.example .bash_aliases
# or ln -s bash_aliases.example .bash_aliases

function prompt {
  local GREEN="\[\e[0;32m\]"
  local RED="\[\e[0;31m\]"
  local CYAN="\[\e[0;36m\]"
  local BLUE="\[\e[0;94m\]"
  local DARK_BLUE="\[\e[0;34m\]"
  local YELLOW="\[\e[0;33m\]"
  local NO_COLOR="\[\e[0;0m\]"


  PS1="\n${GREEN}[${YELLOW}DDEV${GREEN}|${RED}\H${GREEN}]${CYAN}:${BLUE}\w ${GREEN}[\t]\n${RED}\$ ${NO_COLOR}"
  export PS1
}

prompt


export LS_OPTIONS='--color=auto'
alias ls='ls $LS_OPTIONS'
alias ll='ls $LS_OPTIONS -lhA'
alias l='ls $LS_OPTIONS -lh'

alias grep="grep --color"
