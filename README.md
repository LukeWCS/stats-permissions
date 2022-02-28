## Stats Permissions
Extension for phpBB - Allows to define independent permissions for viewing statistics and newest member. The permissions can be set with the full permission system (phpBB), or with the simplified permission system (display for guests/bots).

[![Build Status](https://github.com/LukeWCS/stats-permissions/workflows/Tests/badge.svg)](https://github.com/LukeWCS/stats-permissions/actions)

### Requirements
* phpBB 3.2.10 up to and including phpBB 3.3
* PHP 7.0 up to and including PHP 8.0

### Installation / Update of Stats Permissions
1. Download and extract the Zip archive of the [GitHub release](https://github.com/LukeWCS/stats-permissions/releases).
1. In the extension management disable "Stats Permissions", if already existing.
1. Delete the folder `statspermissions/` inside `ext/lukewcs/` from phpBB, if already existing.
1. Copy the folder `lukewcs/` from the Zip archive including all subfolders and files to `ext/` from phpBB (upload).
1. In the extension management, enable "Stats Permissions".
