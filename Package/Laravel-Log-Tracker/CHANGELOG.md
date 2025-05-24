# Changelog

All notable changes to this project will be documented in this file.

## [1.5] - 2024-01-15

### Added
- **Comprehensive Export System (No Dependencies Required)**
    - **4 Export Formats**: CSV, JSON, Excel XML, PDF (HTML)
    - **Advanced Filtering**: Date ranges, log levels, search terms
    - **Bulk Operations**: Export multiple files simultaneously
    - **Quick Export**: One-click export buttons throughout UI
    - **Professional PDF Reports**: Print-ready HTML with statistics
    - **Smart Limits**: Memory and timeout protection
    - **Auto Cleanup**: Scheduled cleanup of old exports
    - **Activity Logging**: Track all export operations
    - **Permission Control**: Role-based access to export features

### Enhanced
- **Dashboard**: Added bulk export capabilities
- **Log Files List**: Export dropdowns for individual files
- **Log Details**: Filtered export options
- **Performance**: Optimized for large log files

## [1.4] - 2025-05-21

### Fixed
- UI & UX Enhancements
- Bug fixed.

## [1.3.0] - 2025-04-20

### Fixed
- Bug fixed.

## [1.2.0] - 2025-03-17

### Fixed
- Solved stack trace issue where **stack trace was not displayed** for certain log entries.


## [1.2.0] - 2025-03-12

### Added
- **PHP 5.6+ Compatibility**
    - Updated syntax and function usage to support **PHP 5.6 and later**.
    - Ensured compatibility with older Laravel versions while maintaining modern standards.

- **Enhanced Filtering System**
    - Implemented **"No logs found"** message when no logs match the search/filter criteria.
    - Improved search functionality for **faster and more accurate filtering**.

- **UI & UX Enhancements**
    - **Log Level Filtering Improvement**
        - Redesigned log level filter switches for better user experience.
        - Users can now dynamically toggle log levels in a **more intuitive way**.
   
### Fixed
- Resolved an issue where **log filtering was not applying correctly** when using multiple search inputs.
- **Performance optimizations** in log parsing and rendering.
- Removed unnecessary **inline PHP code** in Blade files for **cleaner templates**.


## [1.0.0] - 2025-03-11
### Added
- Initial release of Laravel Log Tracker.

