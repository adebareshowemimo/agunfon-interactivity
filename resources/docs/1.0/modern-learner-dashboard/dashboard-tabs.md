# Dashboard Tabs

---

The dashboard is organized into tabs in a sidebar. The **Overview** renders immediately; the rest load on demand over AJAX.

- [Overview](#overview)
- [Continue learning](#continue)
- [Course Library](#library)
- [My courses](#mycourses)
- [Calendar](#calendar)
- [Grades](#grades)
- [Badges](#badges)
- [Certificates](#certificates)
- [Profile](#profile)

<a name="overview"></a>
## Overview (Dashboard)

The landing tab. A welcome hero greets the learner, above a **stats grid**:

- Total courses
- Completion rate
- Completed activities
- Due soon
- Grade average
- Earned badges
- Achieved certificates *(when Course Certificate is installed)*

The sidebar also shows compact "Done courses / Done activities" counters.

<a name="continue"></a>
## Continue learning

Below the stats, **continue-learning** cards list recently-accessed courses with a course image, progress bar, last-access, and a **Resume** link. A **grid / list** toggle switches the layout, and **View all courses** jumps to the My courses tab. The number of cards is set by the [recent-course limit](/{{route}}/{{version}}/modern-learner-dashboard/admin-settings).

<a name="library"></a>
## Course Library

A catalogue of visible courses the learner can take next. See [Course Library](/{{route}}/{{version}}/modern-learner-dashboard/course-library) for search, filters, sorting, pagination and self-enrolment.

<a name="mycourses"></a>
## My courses

Every enrolment, with its own stats band — enrolled courses, completed courses, completed activities, completed quizzes, certificates and courses completed this year — plus a filterable, sortable, paginated course browser (search, category, status, sort, grid/list). This tab also hosts the [Learning Transcript](/{{route}}/{{version}}/modern-learner-dashboard/learning-transcript).

<a name="calendar"></a>
## Calendar

An embedded **monthly calendar** (Moodle's core calendar) alongside an **Upcoming events** panel, with a **View full calendar** link. It surfaces course events and due dates so learners can see what's coming.

<a name="grades"></a>
## Grades

A per-course table of **progress**, **status** (not started / in progress / completed) and **grade average**, with a link to open each course. Grades are drawn from Moodle's core gradebook — no extra configuration.

<a name="badges"></a>
## Badges

Earned Moodle badges with issuer and issue date, summarized by **active**, **expired** and **course** badges. Badge data comes from Moodle's core badge records.

<a name="certificates"></a>
## Certificates

Issued certificates with code, issue date and expiry. This tab requires the **Course Certificate** activity (`mod_coursecertificate`); if it isn't installed, the tab is hidden and an admin-only notice explains why. See [Requirements](/{{route}}/{{version}}/modern-learner-dashboard/requirements#certificates).

<a name="profile"></a>
## Profile

The learner's details, editable inline. See [Profile Editing](/{{route}}/{{version}}/modern-learner-dashboard/profile-editing).
