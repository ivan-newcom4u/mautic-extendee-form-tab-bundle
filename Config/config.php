<?php

return [
    'name'        => 'Extendee Form Tab',
    'description' => 'Form tab in contacts detail for Mautic',
    'author'      => 'mtcextendee.com',
    'version'     => '1.0.1',
    'routes' => [
        'public' => [
            'mautic_formtabsubmission_edit' => [
                'path'       => '/formtab/submission/edit/{formId}/{objectId}',
                'controller' => 'MauticExtendeeFormTabBundle:Submission:edit',
            ],
            'mautic_formtab_postresults' => [
                'path'       => '/formtab/submission/submit',
                'controller' => 'MauticExtendeeFormTabBundle:Submission:submit',
            ],
        ],
    ],
    'services' => [
        'events' => [
            'mautic.extendee.form.tab.inject.custom.content.subscriber' => [
                'class'     => \MauticPlugin\MauticExtendeeFormTabBundle\EventListener\InjectCustomContentSubscriber::class,
                'arguments' => [
                    'mautic.helper.integration',
                    'mautic.extendee.form.tab.helper'
                ],
            ],
            'mautic.extendee.form.tab.form.subscriber' => [
                'class'     => \MauticPlugin\MauticExtendeeFormTabBundle\EventListener\FormSubscriber::class,
                'arguments' => [
                ],
            ],
        ],
        'forms' => [
            'mautic.form.type.submission' => [
                'class' => MauticPlugin\MauticExtendeeFormTabBundle\Form\Type\SubmissionType::class,
                'alias' => 'submission',
            ],
        ],
        'other' => [
            'mautic.extendee.form.tab.helper' => [
                'class'     => \MauticPlugin\MauticExtendeeFormTabBundle\Helper\FormTabHelper::class,
                'arguments' => [
                    'mautic.helper.templating',
                    'mautic.form.model.form',
                    'mautic.helper.user',
                    'mautic.security',
                    'mautic.form.model.submission',
                    'mautic.helper.integration'
                ],
            ],
        ],
    ],
];
