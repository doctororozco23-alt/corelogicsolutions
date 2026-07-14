$git = "C:\Users\kenne\.gemini\antigravity\scratch\core-logic-solutions\git-portable\cmd\git.exe"
Write-Host "Adding files..."
& $git add .
Write-Host "Committing changes..."
& $git commit -m "Add WordPress theme source code (wp-theme) and ignore ZIP archive"
Write-Host "Pushing to GitHub..."
& $git -c credential.helper= push origin main
Write-Host "Git push finished."
