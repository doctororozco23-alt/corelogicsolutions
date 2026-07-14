$git = "C:\Users\kenne\.gemini\antigravity\scratch\core-logic-solutions\git-portable\cmd\git.exe"
Write-Host "Staging files..."
& $git add .
Write-Host "Committing changes..."
& $git commit -m "Restructure WordPress theme: merge style.css and put scripts in js/ at root"
Write-Host "Pushing to GitHub..."
& $git -c credential.helper= push origin main
Write-Host "Finished."
