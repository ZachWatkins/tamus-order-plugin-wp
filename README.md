# Workstation Ordering Application for WordPress

A GPL-2.0+ WordPress Plugin that provides a user-accessible interface for ordering workstations and accessories and a robust multi-role return / approve workflows and team-based settings. This application is developed, maintained, and operated by the Information Technology unit within the Dean's Office at the Texas A&M University College of Liberal Arts.

## Credits
1. With the exception of third party software, this application was programmed by Mr. Zachary Kendall Watkins zwatkins2@tamu.edu. The only operable code that was copied for this version of the application was the email body copy from the original version of the application, and it was then modified for improvements.
2. The original application was programmed by Joseph Rafferty using different technology, and its visual design and / or workflow specifications were decided by Joseph Rafferty and / or Pamela Luckenbill [https://github.tamu.edu/liberalarts-web/workstation-order](https://github.tamu.edu/liberalarts-web/workstation-order)
3. The visual design at the start of the project was copied from the original application, and then the icons were replaced.
4. The majority of the workflow requirements for this version were preserved from the original application. However, the product, bundle, program, and department data creation and management interface is superseded by this application as it is provided by WordPress Core.
5. The user interface for managing products, programs, departments, and several other aspects of the application are performed in the WordPress administrative interface and therefore no claim is made regarding ownership.

## Features

1. AJAX form submission using nonces which WordPress uses to authenticate the call, for security
2. AJAX file uploads to the WordPress media library converted to attachment post types
3. PDF rendering using the FPDF library
4. A gated approval flow that renders an order’s “approval” template if the user viewing the order needs to perform an action at that point in time, and renders its “view” template if not
5. Only allows users who submitted an order or who must approve an order to see it
6. Has custom Dashboard widgets, which are nice to use sometimes to give users information
7. Custom user roles and permissions
8. Custom post types
9. Uses Advanced Custom Fields for order fields and the Settings page
10. Affiliated business staff can view orders, will be CC'd on emails sent to the business staff responsible for approving an order.

## Custom User Capability Meta

1. manage_acf_options: Determines who can see the Advanced Custom Fields options page.
2. manage_wso_options: Determines who can see the Workstation Ordering App options page.
3. All custom post types have each of their capabilities namespaced using their post type slug. Example: `create_wsorders`

## To Do

1. Implement Active Directory user authentication, onboarding, and offboarding using either the WordPress SAML SSO plugin from OneLogin, the TAMU directory REST API [https://mqs.tamu.edu/rest/](https://mqs.tamu.edu/rest/), or both and one or more WordPress Cron tasks or manual functions.
2. Remove the following form fields from the `edit-user.php` administrative UI since they are not used: Visual Editor, Keyboard Shortcuts, Website, Biographical Info, Profile Picture, New Password, Password Reset.

## Legacy Support

Legacy support is and will continue to be an ever-present responsibility of Information Technology professionals and this subject should be discussed with respect and understanding. This plugin includes a file for keeping PHP code separated from the rest of the codebase that I consider to be dependent upon transient, external resources. Those resources may be other WordPress plugins, third party APIs, or other technologies not considered essential to the critical operations of the service this plugin provides. This file is located at `src/class-legacy-support.php`.

## WordPress Requirements

1. Single site install support only at this time.
2. [https://github.tamu.edu/liberalarts-web/cla-wsorder](WSOrder Genesis Child Theme)
3. TAMU CAS Authentication Plugin
4. [https://www.advancedcustomfields.com/pro/](Advanced Custom Fields Pro) Plugin
5. [https://wordpress.org/plugins/post-smtp/](Post SMTP) Plugin for secure email delivery with an email log and one-click resending of failed emails
6. [https://github.com/johnbillion/user-switching](User Switching) Plugin (Github.com link, updated more frequently than WordPress repository plugin)
7. [https://wordpress.org/plugins/duplicate-post/](Yoast Duplicate Post) Plugin
8. [https://wordpress.org/plugins/simple-history/](Simple History) Plugin for debugging and user support

## Installation

1. Download the latest release here: [https://github.tamu.edu/liberalarts-web/cla-workstation-order/releases/latest/](https://github.tamu.edu/liberalarts-web/cla-workstation-order/releases/)
2. Upload the plugin to your site via the admin dashboard plugin upload panel.

## Developer Notes

Please refer to the [https://developer.wordpress.org/coding-standards/wordpress-coding-standards/](WordPress Coding Standards) when you have questions about how to format your code.

[https://make.wordpress.org/core/handbook/tutorials/installing-a-vcs/](Installing a Version Control System)

### Developer Features

This repository uses [PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer/) with WordPress coding standards checks but is NOT fully compliant with that tool yet. A pre-commit hook file is included in this repository to enforce code commits to meet this standard. I have also configured Git and Visual Studio Code files in this repository to help improve compatibility between Mac (terminal) and Windows (powershell) environments.

It also uses the FPDF library [https://packagist.org/packages/setasign/fpdf](https://packagist.org/packages/setasign/fpdf) to provide secure and data-driven PDF documents on demand without storing them on the server.

### Code Conventions

Line endings are enforced as LF "\n". This is what WordPress requires for its Subversion version control system, which is what developers must use to submit their WordPress plugins and themes to the official WordPress public extension library.

### Tips Learned From This Project

To add an executable file to git version control, do this: `git add --chmod=+x hooks/pre-commit && git commit -m "Add pre-commit executable hook"`

### Potential Installation Issues

#### Windows 10 IIS Server Port 80 Conflict with "Local" application by Flywheel

[https://localwp.com/help-docs/advanced/router-mode/](https://localwp.com/help-docs/advanced/router-mode/)
On one (but not all) Dell Windows 10 machine I had to disable the Windows IIS service which was running on IP 0.0.0.0:80 and interfered with my local development environment application's router functionality. The application name is Local, by Flywheel, which is owned by WP Engine.
