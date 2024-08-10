<?php

if (!class_exists('EmployeeLeaveStatus')) {
    class EmployeeLeaveStatus {
        const ON_PROGRESS = "on_progress";
        const APPROVED = "approved";
        const REJECTED = "rejected";
    }
}

if (!class_exists('EmployeeScheduleStatus')) {
    class EmployeeScheduleStatus {
        const ON_PROGRESS = "on_progress";
        const APPROVED = "approved";
        const REJECTED = "rejected";
    }
}

if (!class_exists('EmployeeScheduleWorkTime')) {
    class EmployeeScheduleWorkTime {
        const REGULAR = "regular";
        const MORNING = "morning";
        const AFTERNOON = "afternoon";
        const NIGHT = "night";
    }
}


if (!class_exists('EmployeeScheduleWorkType')) {
    class EmployeeScheduleWorkType {
        const REGULAR = "regular";
        const SHIFT = "shift";
    }
}


if (!class_exists('EmployeeStatus')) {
    class EmployeeStatus {
        const ACTIVE = "active";
        const ON_LEAVE = "on_leave";
    }
}


if (!class_exists('UserRole')) {
    class UserRole {
        const ADMIN = 'admin';
        const USER = 'user';
    }
}
