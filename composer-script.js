require('dotenv').config();

const { execSync } = require('child_process');

// Define Docker build command with environment variables
const dockerBuildCommand = `docker build --build-arg NOVA_USER="${process.env.NOVA_USER}" --build-arg NOVA_LICENSE="${process.env.NOVA_LICENSE}" -t nova-file-manager-composer .`;
execSync(dockerBuildCommand, { stdio: 'inherit' });

// Run Docker container
const dockerRunCommand = `docker run -it -v /home/mathias/projects/jdv/NovaFileManager/vendor:/app/vendor nova-file-manager-composer`;
execSync(dockerRunCommand, { stdio: 'inherit' });