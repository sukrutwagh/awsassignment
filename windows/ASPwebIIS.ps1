Set-ExecutionPolicy Unrestricted
Set-MpPreference -DisableRealtimeMonitoring $true
Add-windowsfeature web-webserver -includeallsubfeature -logpath $env:temp\\webserver_addrole.log
Add-windowsfeature web-mgmt-tools -includeallsubfeature -logpath $env:temp\\mgmttools_addrole.log
Import-Module WebAdministration
New-WebSite -Name myapp -Port 80 -HostHeader localhost -PhysicalPath "D:\inetpub\myapp" -Force
New-WebBinding -Name myapp -IPAddress "*" -Port 80 -HostHeader "*"
Try {
    ErrorAction "Stop"
    Remove-website -Name "Default Web Site" 
  } 
 Catch {
     Write-Output "Unable to remove Default Web Site"
 }
start-website -name myapp
Set-MpPreference -DisableRealtimeMonitoring $false