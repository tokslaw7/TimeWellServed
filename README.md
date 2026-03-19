# Time Well Served

**Meaningful volunteer opportunities that match your passion.**

Time Well Served is a **CodeIgniter 4** web application designed to simplify community service fulfillment by connecting **volunteers**, **nonprofits**, and **case managers** in one trusted platform. The current repository presents the project as a landing page and foundation for a broader compliance-focused volunteer management system.

---

## Overview

Community service should be organized, transparent, and easy to verify. Time Well Served aims to reduce friction for everyone involved by making it easier to:

- discover verified volunteer opportunities
- log service hours accurately
- track deadlines and progress
- verify participation with GPS-based check-ins
- streamline reporting for case managers and supervising organizations

The current implementation is centered around a homepage experience that communicates the product vision and user value proposition.

---

## Vision

Time Well Served is built around a simple idea:

> Community service is meant to rehabilitate, not re-punish.

The platform is intended to help users complete required service hours with less confusion, less paperwork, and more accountability.

---

## Core User Groups

### Volunteers
Volunteers can use the platform to:
- find meaningful service opportunities
- match opportunities to their interests and schedules
- log hours with check-ins and approvals
- view progress toward deadlines
- keep records ready for submission

### Case Managers
Case managers can use the platform to:
- monitor participants in one dashboard
- review deadlines and completed hours
- verify submissions
- generate reports faster
- reduce administrative overhead

### Nonprofits
Nonprofits can use the platform to:
- join a verified partner network
- receive volunteers more efficiently
- support structured hour tracking and sign-off workflows

---

## Current Features in This Repository

The repository currently includes the following implemented or scaffolded elements:

- **CodeIgniter 4 application structure**
- **Homepage controller and landing page view**
- **Apache + Docker containerization**
- **GitHub Actions workflow for Docker image publishing**
- **Public asset organization** for CSS, JS, images, fonts, JSON, PHP helpers, vendors, and videos
- **Testing scaffold** using PHPUnit and the default CodeIgniter test layout

### Product messaging currently shown in the UI
The homepage content highlights these planned product capabilities:
- smart opportunity matching
- GPS location verification
- case manager dashboard access
- automated compliance workflows
- real-time tracking for service progress

---

## Tech Stack

### Backend
- **PHP 8.1**
- **CodeIgniter 4**

### Frontend
- Server-rendered PHP view templates
- Static assets under `public/assets/`
- CSS, JavaScript, images, fonts, JSON, vendor libraries, and videos

### DevOps / Infrastructure
- **Apache**
- **Docker Compose**
- **GitHub Actions**
- **Composer**

### Testing
- **PHPUnit**

---

## Application Structure

```text
TimeWellServed/
├── .github/workflows/        # CI workflow for Docker image publishing
├── app/
│   ├── Config/               # Application configuration and routes
│   ├── Controllers/          # HTTP controllers
│   └── Views/                # UI templates
├── docker/apache/            # Apache config and Dockerfile
├── public/                   # Public web root
│   └── assets/               # CSS, JS, fonts, images, vendors, videos, etc.
├── system/                   # CodeIgniter core
├── tests/                    # PHPUnit test scaffold
├── writable/                 # Runtime-generated writable files
├── composer.json             # PHP dependencies and scripts
├── docker-compose.yml        # Local container orchestration
└── spark                     # CodeIgniter CLI entry point
```

---

## Routing

The current route definitions include:

- `/`
- `/portfolio`
- `/about`
- `/services`

At the moment, the repository clearly includes a `Home` controller and a `welcome_message.php` view. If you plan to activate the additional routes in production, make sure the corresponding controllers and views are implemented and wired correctly.

---

## Current Implementation Notes

At this stage, the repository behaves primarily like a **product landing page / application starter** rather than a complete end-to-end volunteer management system.

A few important observations:

1. The main implemented controller is `Home.php`.
2. The homepage renders `welcome_message.php`, which contains the product marketing sections and messaging.
3. Some sections of the page already reflect the Time Well Served concept, while parts of the template still contain placeholder/demo copy that should be refined before launch.

That means this project is well-positioned as a foundation for future feature development such as authentication, role-based dashboards, hour logging workflows, reporting, partner onboarding, and database-backed compliance records.

---

## Local Development

### Option 1: Run with Docker

#### Prerequisites
- Docker
- Docker Compose

#### Environment
The repository already includes a minimal `.env` file with:

```env
CONTAINER_PORT=5055
UID=1000
```

#### Start the application
```bash
docker compose up --build
```

Then open:

```text
http://localhost:5055
```

### Option 2: Run locally with PHP

#### Prerequisites
- PHP 8.1+
- Composer
- Required PHP extensions for CodeIgniter 4, especially `intl` and `mbstring`

#### Install dependencies
```bash
composer install
```

#### Run the development server
```bash
php spark serve
```

Then open the local URL shown in the terminal.

---

## Docker Setup

The Docker configuration uses:
- `php:8.1-apache` as the base image
- Apache `DocumentRoot` pointed to `/var/www/html/public`
- PHP extensions for common web/database/image needs
- Composer installation during image build
- mounted source code for local development

The project’s Apache virtual host is configured to serve the application from the `public/` directory, which follows CodeIgniter 4 best practices.

---

## GitHub Actions

The repository includes a workflow that builds and pushes a Docker image when code is pushed to the `main` branch.

This is useful for:
- containerized deployment pipelines
- keeping Docker images updated automatically
- integrating with a registry-based release process

Before using it in production, update the image tag from the placeholder value to your actual Docker Hub or registry namespace.

---

## Testing

The project contains the default CodeIgniter testing scaffold under `tests/` and a `phpunit.xml.dist` file in the root.

To run tests:

```bash
./vendor/bin/phpunit
```

Or, if you create the common local symlink:

```bash
./phpunit
```

As the platform grows, recommended test coverage should include:
- route/controller tests
- validation tests
- service/business-logic tests
- database integration tests
- authentication and authorization tests

---

## Recommended Next Steps

To move Time Well Served from landing page to production-ready platform, consider prioritizing:

### 1. Authentication and Role Management
Create user roles for:
- volunteers
- case managers
- nonprofit partners
- administrators

### 2. Opportunity Management
Build features to:
- create and publish opportunities
- categorize opportunities by cause, location, and time
- support approval and moderation workflows

### 3. Service Hour Logging
Add:
- check-in/check-out flows
- supervisor approval
- signed logs
- dispute handling and audit trails

### 4. Compliance Dashboard
Create dashboards for:
- active cases
- total completed hours
- upcoming deadlines
- flagged submissions
- exportable reports

### 5. Data Layer
Introduce:
- database schema and migrations
- models and repositories
- persistence for users, organizations, shifts, logs, and reports

### 6. Frontend Cleanup
Replace placeholder/demo copy with:
- final product language
- real screenshots
- accessible forms
- working CTAs and user flows

### 7. Security and Privacy
Add:
- authentication hardening
- audit logging
- input validation
- rate limiting
- privacy policy alignment
- secure handling of sensitive participant records

---

## Known Gaps / Improvement Areas

Based on the current repository state, these are worth addressing next:

- The README in the repo is still the default CodeIgniter README and does not yet describe the Time Well Served product.
- The codebase currently appears homepage-focused rather than feature-complete.
- Additional defined routes should be validated against actual controller/view implementations.
- The landing page still contains placeholder template content in multiple sections.
- CI image tags and deployment details should be updated for a real registry and release strategy.

---

## Why This Project Matters

Time Well Served addresses a real operational and social problem:

- volunteers need a less confusing way to complete service requirements
- nonprofits need better visibility and coordination
- case managers need trustworthy oversight and faster reporting

By combining verified opportunities, accurate hour tracking, and centralized oversight, the platform has the potential to make community service more humane, efficient, and accountable.

---

## Contributing

Contributions are welcome. A good contribution path would be:

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add or update tests where needed
5. Submit a pull request

Suggested contribution areas:
- route/controller implementation
- dashboard development
- database modeling
- testing coverage
- accessibility improvements
- deployment hardening

---

## License

This project is licensed under the **MIT License**.

---

## Maintainer

**Tokslaw / tokslaw7**

If you are building this project forward, the best next move is to align the codebase, product copy, and deployment pipeline around the actual Time Well Served platform roadmap.
