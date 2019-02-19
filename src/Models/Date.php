<?php

namespace einfachArchiv\ZUGFeRD\Models;

use Carbon\Carbon;

class Date extends Model
{
    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = parent::NAMESPACE_UDT;

    /**
     * Returns the date.
     *
     * @return string|null
     */
    public function date()
    {
        return (string) $this->element->DateTimeString ?: null;
    }

    /**
     * Returns the format.
     *
     * @return string|null
     */
    public function format()
    {
        if (empty($this->element->DateTimeString)) {
            return null;
        }

        return (string) $this->element->DateTimeString->attributes()->format ?: null;
    }

    /**
     * Returns a Carbon instance.
     *
     * @return \Carbon\Carbon|null
     */
    public function carbon()
    {
        $date = $this->date();

        if (!is_null($date)) {
            switch ($this->format()) {
                case '102':
                    $format = 'Ymd';
                    $resetTime = true;
                    break;

                case '610':
                    $format = 'Ym';
                    $resetTime = true;
                    break;

                case '616':
                    $format = 'YW';
                    $resetTime = true;
                    break;

                default:
                    $format = 'Y-m-d\Th:i:s';
                    $resetTime = false;
                    break;
            }

            $carbon = Carbon::createFromFormat($format, $date);

            if ($resetTime) {
                $carbon->hour(0)->minute(0)->second(0);
            }

            return $carbon;
        }
    }

    /**
     * Returns a dateTime string.
     *
     * @return string|null
     */
    public function dateTimeString()
    {
        $carbon = $this->carbon();

        if (!is_null($carbon)) {
            return $carbon->toDateTimeString();
        }
    }

    /**
     * Returns a date string.
     *
     * @return string|null
     */
    public function dateString()
    {
        $carbon = $this->carbon();

        if (!is_null($carbon)) {
            return $carbon->toDateString();
        }
    }
}
