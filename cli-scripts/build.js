import { execSync } from 'child_process';
import { rmdirSync } from 'fs';
import { join } from 'path';
import { fileURLToPath } from 'url';
import { dirname } from 'path';

const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);

console.log('Format src directory...');
execSync('npm run prettier', { stdio: 'inherit' });

console.log('Clearing build directory...');
rmdirSync(join(__dirname, '../dist'), { recursive: true });

console.log('Building styles...');
execSync('npm run build-style', { stdio: 'inherit' });

console.log('Building JavaScript...');
execSync('npm run build-js', { stdio: 'inherit' });
