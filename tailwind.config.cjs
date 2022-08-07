module.exports = {
  content: ['./*.php', './**/*.php'],
  theme: {},
  plugins: [require('@tailwindcss/typography')],
  safelist: [
    {
      pattern: /font-(light|normal|medium|semibold|bold)/,
    },
    {
      pattern: /leading-(none|tight|snug|normal|relaxed|loose)/,
    },
    {
      pattern: /object-(cover|contain)/,
    },
    {
      pattern: /bg-(cover|contain|no-repeat)/,
    },
    'mx-auto',
  ],
};
