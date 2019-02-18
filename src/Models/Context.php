<?php

namespace einfachArchiv\ZUGFeRD\Models;

use einfachArchiv\ZUGFeRD\Schema\Types;

class Context extends Model
{
    /**
     * Returns the type.
     *
     * @return string
     */
    public function type()
    {
        switch ($this->children()->GuidelineSpecifiedDocumentContextParameter->ID) {
            case 'urn:ferd:CrossIndustryDocument:invoice:1p0:basic':
            default:
                $type = Types::BASIC;
                break;

            case 'urn:ferd:CrossIndustryDocument:invoice:1p0:comfort':
                $type = Types::COMFORT;
                break;

            case 'urn:ferd:CrossIndustryDocument:invoice:1p0:extended':
                $type = Types::EXTENDED;
                break;
        }

        return $type;
    }
}
