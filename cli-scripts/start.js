import concurrently from 'concurrently';

concurrently([
  {
    command: 'npm run watch-style',
    prefixColor: 'cyan',
    name: 'style',
  },
  {
    command: 'npm run watch-js',
    prefixColor: 'yellow',
    name: 'js',
  },
]);
