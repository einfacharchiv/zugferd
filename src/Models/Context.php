<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Context extends Model
{
    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = parent::NAMESPACE_RAM;

    /**
     * Returns the type.
     *
     * @return string
     */
    public function getType()
    {
        switch ($this->element->GuidelineSpecifiedDocumentContextParameter->ID) {
            case 'urn:ferd:CrossIndustryDocument:invoice:1p0:basic':
            default:
                $type = parent::TYPE_BASIC;
                break;

            case 'urn:ferd:CrossIndustryDocument:invoice:1p0:comfort':
                $type = parent::TYPE_COMFORT;
                break;

            case 'urn:ferd:CrossIndustryDocument:invoice:1p0:extended':
                $type = parent::TYPE_EXTENDED;
                break;
        }

        return $type;
    }
}
