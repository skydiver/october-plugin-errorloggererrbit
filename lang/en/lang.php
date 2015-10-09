<?php

    return [

        'plugin' => [
            'name'        => 'Error Logger - Errbit Support',
            'description' => 'Extend Error Logger to support Errbit',
            'author'      => 'Martin M.'
        ],

        'tab' => [
            'name' => 'Errbit',
        ],

        'fields' => [
            'errbit_enabled' => [
                'label' => 'Enable Errbit tracking'
            ],
            'errbit_api_key' => [
                'label' => 'Errbit API Key'
            ],
            'errbit_host' => [
                'label'   => 'Errbit Host',
                'comment' => 'Your Errbit Host or api.airbrake.io for Airbrake'
            ],
            'errbit_port' => [
                'label'   => 'Errbit Port',
            ],
            'errbit_secure' => [
                'label' => 'Force secure connection',
            ],
            'errbit_project_root' => [
                'label' => 'Project root',
            ],
            'errbit_environment_name' => [
                'label'  => 'Environment name',
            ],
            'errbit_params_filters' => [
                'label'   => 'Filter parameters',
                'comment' => 'Sensitive values will be replaced with [FILTERED]. Separate by commas.'
            ],
            'errbit_backtrace_filters' => [
                'label'   => 'Backtrace filter',
                'comment' => '-'
            ],
        ],


    ];

?>