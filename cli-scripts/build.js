const execSync = require('child_process').execSync;
const fs = require('fs');
const path = require('path');

console.log('Format src directory...');
execSync('npm run prettier', { stdio: 'inherit' });

console.log('Clearing build directory...');
fs.rmdirSync(path.join(__dirname, '../dist'), { recursive: true });

console.log('Building styles...');
execSync('npm run build-style', { stdio: 'inherit' });

console.log('Building JavaScript...');
execSync('npm run build-js', { stdio: 'inherit' });
