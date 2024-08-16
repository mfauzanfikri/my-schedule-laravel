<?php

if (!class_exists('EmployeeLeaveStatus')) {
    class EmployeeLeaveStatus {
        const ON_PROGRESS = "on_progress";
        const APPROVED = "approved";
        const REJECTED = "rejected";

        public static function list(): array {
            $rc = new ReflectionClass(self::class);

            return $rc->getConstants();
        }
    }
}

if (!class_exists('EmployeeScheduleStatus')) {
    class EmployeeScheduleStatus {
        const ON_PROGRESS = "on_progress";
        const APPROVED = "approved";
        const REJECTED = "rejected";

        public static function list(): array {
            $rc = new ReflectionClass(self::class);

            return $rc->getConstants();
        }
    }
}

if (!class_exists('EmployeeScheduleWorkTime')) {
    class EmployeeScheduleWorkTime {
        const REGULAR = "regular";
        const MORNING = "morning";
        const AFTERNOON = "afternoon";
        const NIGHT = "night";

        public static function list(): array {
            $rc = new ReflectionClass(self::class);

            return $rc->getConstants();
        }
    }
}


if (!class_exists('EmployeeScheduleWorkType')) {
    class EmployeeScheduleWorkType {
        const REGULAR = "regular";
        const SHIFT = "shift";

        public static function list(): array {
            $rc = new ReflectionClass(self::class);

            return $rc->getConstants();
        }
    }
}


if (!class_exists('EmployeeStatus')) {
    class EmployeeStatus {
        const ACTIVE = "active";
        const ON_LEAVE = "on_leave";

        public static function list(): array {
            $rc = new ReflectionClass(self::class);

            return $rc->getConstants();
        }
    }
}
