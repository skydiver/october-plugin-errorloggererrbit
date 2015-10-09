<?php

    namespace Martin\ErrorLoggerErrbit;

    use System\Classes\PluginBase;
    use Event, Lang;

    class Plugin extends PluginBase {

        public $require = ['VojtaSvoboda.ErrorLogger'];

        public function pluginDetails() {
            return [
                'name'        => 'martin.errorloggererrbit::lang.plugin.name',
                'description' => 'martin.errorloggererrbit::lang.plugin.description',
                'author'      => 'martin.errorloggererrbit::lang.plugin.author',
                'icon'        => 'icon-bug',
                'homepage'    => 'https://octobercms.com/author/Martin'
            ];
        }

        public function boot() {

            Event::listen('backend.form.extendFields', function($widget) {

                if(!$widget->model instanceof \VojtaSvoboda\ErrorLogger\Models\Settings) {
                    return;
                }

                $widget->addTabFields([

                    'errbit_enabled' => [
                        'tab'     => 'martin.errorloggererrbit::lang.tab.name',
                        'label'   => 'martin.errorloggererrbit::lang.fields.errbit_enabled.label',
                        'type'    => 'switch'
                    ],

                    'errbit_api_key' => [
                        'tab'      => 'martin.errorloggererrbit::lang.tab.name',
                        'label'    => 'martin.errorloggererrbit::lang.fields.errbit_api_key.label',
                        'required' => true,
                        'trigger'  => [
                            'action'    => 'show',
                            'field'     => 'errbit_enabled',
                            'condition' => 'checked'
                        ]
                    ],

                    'errbit_host' => [
                        'tab'           => 'martin.errorloggererrbit::lang.tab.name',
                        'label'         => 'martin.errorloggererrbit::lang.fields.errbit_host.label',
                        'commentAbove'  => 'martin.errorloggererrbit::lang.fields.errbit_host.comment',
                        'required'      => true,
                        'trigger'       => [
                            'action'    => 'show',
                            'field'     => 'errbit_enabled',
                            'condition' => 'checked'
                        ]
                    ],

                    'errbit_port' => [
                        'tab'      => 'martin.errorloggererrbit::lang.tab.name',
                        'label'    => 'martin.errorloggererrbit::lang.fields.errbit_port.label',
                        'required' => true,
                        'default'  => 80,
                        'trigger'  => [
                            'action'    => 'show',
                            'field'     => 'errbit_enabled',
                            'condition' => 'checked'
                        ]
                    ],

                    'errbit_secure' => [
                        'tab'     => 'martin.errorloggererrbit::lang.tab.name',
                        'label'   => 'martin.errorloggererrbit::lang.fields.errbit_secure.label',
                        'type'    => 'switch',
                        'trigger' => [
                            'action'    => 'show',
                            'field'     => 'errbit_enabled',
                            'condition' => 'checked'
                        ]
                    ],

                    'errbit_project_root' => [
                        'tab'     => 'martin.errorloggererrbit::lang.tab.name',
                        'label'   => 'martin.errorloggererrbit::lang.fields.errbit_project_root.label',
                        'default' => base_path().'/',
                        'trigger' => [
                            'action'    => 'show',
                            'field'     => 'errbit_enabled',
                            'condition' => 'checked'
                        ]
                    ],

                    'errbit_environment_name' => [
                        'tab'     => 'martin.errorloggererrbit::lang.tab.name',
                        'label'   => 'martin.errorloggererrbit::lang.fields.errbit_environment_name.label',
                        'default' => \App::environment(),
                        'trigger' => [
                            'action'    => 'show',
                            'field'     => 'errbit_enabled',
                            'condition' => 'checked'
                        ]
                    ],

                    'errbit_params_filters' => [
                        'tab'          => 'martin.errorloggererrbit::lang.tab.name',
                        'label'        => 'martin.errorloggererrbit::lang.fields.errbit_params_filters.label',
                        'commentAbove' => 'martin.errorloggererrbit::lang.fields.errbit_params_filters.comment',
                        'default'      => 'password,card_number',
                        'trigger' => [
                            'action'    => 'show',
                            'field'     => 'errbit_enabled',
                            'condition' => 'checked'
                        ]
                    ],

                    // 'errbit_backtrace_filters' => [
                    //     'tab'          => 'martin.errorloggererrbit::lang.tab.name',
                    //     'label'        => 'martin.errorloggererrbit::lang.fields.errbit_backtrace_filters.label',
                    //     'commentAbove' => 'martin.errorloggererrbit::lang.fields.errbit_backtrace_filters.comment',
                    //     'trigger' => [
                    //         'action'    => 'show',
                    //         'field'     => 'errbit_enabled',
                    //         'condition' => 'checked'
                    //     ]
                    // ],

                ]);

            });

        }
    }

?>