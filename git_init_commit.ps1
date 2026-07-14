$git = "C:\Users\kenne\.gemini\antigravity\scratch\core-logic-solutions\git-portable\cmd\git.exe"

Write-Host "Initializing Git repository..."
& $git init

Write-Host "Configuring local committer identity..."
& $git config --local user.name "Core Logic Solutions"
& $git config --local user.email "contacto@corelogicsolutions.com"

Write-Host "Adding files..."
& $git add .

Write-Host "Creating initial commit..."
& $git commit -m "Initial commit: Core Logic Solutions website template"
