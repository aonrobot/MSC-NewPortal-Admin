$drive_name = "E:\"
$project_name = "MSCNewportal"
$current_path = pwd

Write-Host "For Deploy Laravel Code"
Write-Host "---------------------------------"

if($current_path -ne "$drive_name$project_name"){
    cd "$drive_name$project_name"
}

php artisan view:clear

php artisan route:clear

php artisan config:clear

php artisan cache:clear

php artisan optimize