i<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class WhatsappConnector extends Module
{
    public function __construct()
    {
        $this->name = 'whatsappconnector';
        $this->tab = 'front_office_features';
        $this->version = '1.0.1';
        $this->author = 'Saqueta Melo Cristian';
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('WhatsApp Connector Avanzado');
        $this->description = $this->l('Botones flotantes de Chat y Canal con opciones avanzadas.');
    }

    public function install()
    {
        return parent::install()
            && $this->registerHook('displayFooter')
            && $this->registerHook('header')
            && $this->initConfig();
    }

    public function uninstall()
    {
        return parent::uninstall()
            && $this->deleteConfig();
    }

    protected function initConfig()
    {
        $defaults = [
            // Chat directo
            'WC_ENABLE_CHAT'         => 0,
            'WC_PHONE_NUMBER'        => '',
            'WC_BTN_CHAT_TYPE'       => 'image',
            'WC_CHAT_BUTTON_TEXT'    => $this->l('Chat WhatsApp'),
            'WC_CHAT_BG_COLOR'       => '#25D366',
            'WC_CHAT_HOVER_COLOR'    => '#128C7E',
            'WC_CHAT_TEXT_COLOR'     => '#FFFFFF',
            'WC_CHAT_POSITION'       => 'left',
            // Canal
            'WC_ENABLE_CHANNEL'      => 0,
            'WC_CHANNEL_ID'          => '',
            'WC_BTN_CHANNEL_TYPE'    => 'image',
            'WC_CHANNEL_BUTTON_TEXT' => $this->l('Unirse al canal'),
            'WC_CHANNEL_BG_COLOR'    => '#075E54',
            'WC_CHANNEL_HOVER_COLOR' => '#053F3A',
            'WC_CHANNEL_TEXT_COLOR'  => '#FFFFFF',
            'WC_CHANNEL_POSITION'    => 'right',
        ];

        foreach ($defaults as $key => $value) {
            Configuration::updateValue($key, $value);
        }
        return true;
    }

    protected function deleteConfig()
    {
        $keys = [
            'WC_ENABLE_CHAT','WC_PHONE_NUMBER','WC_BTN_CHAT_TYPE','WC_CHAT_BUTTON_TEXT',
            'WC_CHAT_BG_COLOR','WC_CHAT_HOVER_COLOR','WC_CHAT_TEXT_COLOR','WC_CHAT_POSITION',
            'WC_ENABLE_CHANNEL','WC_CHANNEL_ID','WC_BTN_CHANNEL_TYPE','WC_CHANNEL_BUTTON_TEXT',
            'WC_CHANNEL_BG_COLOR','WC_CHANNEL_HOVER_COLOR','WC_CHANNEL_TEXT_COLOR','WC_CHANNEL_POSITION',
        ];
        foreach ($keys as $key) {
            Configuration::deleteByName($key);
        }
        return true;
    }

    public function getContent()
    {
        $output = '';
        if (Tools::isSubmit('submitWhatsappConnector')) {
            $fields = [
                'WC_ENABLE_CHAT'         => (int)Tools::getValue('WC_ENABLE_CHAT'),
                'WC_PHONE_NUMBER'        => pSQL(Tools::getValue('WC_PHONE_NUMBER')),
                'WC_BTN_CHAT_TYPE'       => pSQL(Tools::getValue('WC_BTN_CHAT_TYPE')),
                'WC_CHAT_BUTTON_TEXT'    => pSQL(Tools::getValue('WC_CHAT_BUTTON_TEXT')),
                'WC_CHAT_BG_COLOR'       => pSQL(Tools::getValue('WC_CHAT_BG_COLOR')),
                'WC_CHAT_HOVER_COLOR'    => pSQL(Tools::getValue('WC_CHAT_HOVER_COLOR')),
                'WC_CHAT_TEXT_COLOR'     => pSQL(Tools::getValue('WC_CHAT_TEXT_COLOR')),
                'WC_CHAT_POSITION'       => pSQL(Tools::getValue('WC_CHAT_POSITION')),
                'WC_ENABLE_CHANNEL'      => (int)Tools::getValue('WC_ENABLE_CHANNEL'),
                'WC_CHANNEL_ID'          => pSQL(Tools::getValue('WC_CHANNEL_ID')),
                'WC_BTN_CHANNEL_TYPE'    => pSQL(Tools::getValue('WC_BTN_CHANNEL_TYPE')),
                'WC_CHANNEL_BUTTON_TEXT' => pSQL(Tools::getValue('WC_CHANNEL_BUTTON_TEXT')),
                'WC_CHANNEL_BG_COLOR'    => pSQL(Tools::getValue('WC_CHANNEL_BG_COLOR')),
                'WC_CHANNEL_HOVER_COLOR' => pSQL(Tools::getValue('WC_CHANNEL_HOVER_COLOR')),
                'WC_CHANNEL_TEXT_COLOR'  => pSQL(Tools::getValue('WC_CHANNEL_TEXT_COLOR')),
                'WC_CHANNEL_POSITION'    => pSQL(Tools::getValue('WC_CHANNEL_POSITION')),
            ];

            foreach ($fields as $key => $value) {
                Configuration::updateValue($key, $value);
            }
            $output .= $this->displayConfirmation($this->l('Configuración guardada.'));
        }

        return $output . $this->renderForm();
    }

    protected function renderForm()
    {
        // Asignar valores actuales
        $this->context->smarty->assign([
            'module_dir'             => $this->_path,
            'enable_chat'            => Configuration::get('WC_ENABLE_CHAT'),
            'phone_number'           => Configuration::get('WC_PHONE_NUMBER'),
            'btn_chat_type'          => Configuration::get('WC_BTN_CHAT_TYPE'),
            'chat_button_text'       => Configuration::get('WC_CHAT_BUTTON_TEXT'),
            'chat_bg_color'          => Configuration::get('WC_CHAT_BG_COLOR'),
            'chat_hover_color'       => Configuration::get('WC_CHAT_HOVER_COLOR'),
            'chat_text_color'        => Configuration::get('WC_CHAT_TEXT_COLOR'),
            'chat_position'          => Configuration::get('WC_CHAT_POSITION'),
            'enable_channel'         => Configuration::get('WC_ENABLE_CHANNEL'),
            'channel_id'             => Configuration::get('WC_CHANNEL_ID'),
            'btn_channel_type'       => Configuration::get('WC_BTN_CHANNEL_TYPE'),
            'channel_button_text'    => Configuration::get('WC_CHANNEL_BUTTON_TEXT'),
            'channel_bg_color'       => Configuration::get('WC_CHANNEL_BG_COLOR'),
            'channel_hover_color'    => Configuration::get('WC_CHANNEL_HOVER_COLOR'),
            'channel_text_color'     => Configuration::get('WC_CHANNEL_TEXT_COLOR'),
            'channel_position'       => Configuration::get('WC_CHANNEL_POSITION'),
            'form_action'            => Tools::safeOutput($_SERVER['REQUEST_URI']),
        ]);

        return $this->display(__FILE__, 'views/templates/admin/configure.tpl');
    }

    public function hookHeader()
    {
        // CSS general
        $this->context->controller->addCSS($this->_path . 'views/css/whatsappconnector.css');
    }

    public function hookDisplayFooter($params)
    {
        // Variables para Smarty
        $vars = [
            'chatEnabled'        => Configuration::get('WC_ENABLE_CHAT'),
            'phone'              => Configuration::get('WC_PHONE_NUMBER'),
            'btnChatType'        => Configuration::get('WC_BTN_CHAT_TYPE'),
            'chatButtonText'     => Configuration::get('WC_CHAT_BUTTON_TEXT'),
            'chatBgColor'        => Configuration::get('WC_CHAT_BG_COLOR'),
            'chatHoverColor'     => Configuration::get('WC_CHAT_HOVER_COLOR'),
            'chatTextColor'      => Configuration::get('WC_CHAT_TEXT_COLOR'),
            'chatPos'            => Configuration::get('WC_CHAT_POSITION'),

            'channelEnabled'     => Configuration::get('WC_ENABLE_CHANNEL'),
            'channelId'          => Configuration::get('WC_CHANNEL_ID'),
            'btnChannelType'     => Configuration::get('WC_BTN_CHANNEL_TYPE'),
            'channelButtonText'  => Configuration::get('WC_CHANNEL_BUTTON_TEXT'),
            'chanBgColor'        => Configuration::get('WC_CHANNEL_BG_COLOR'),
            'chanHoverColor'     => Configuration::get('WC_CHANNEL_HOVER_COLOR'),
            'chanTextColor'      => Configuration::get('WC_CHANNEL_TEXT_COLOR'),
            'chanPos'            => Configuration::get('WC_CHANNEL_POSITION'),

            'module_dir'         => $this->_path,
        ];

        $this->context->smarty->assign($vars);
        return $this->display(__FILE__, 'views/templates/hook/displayFooter.tpl');
    }
}
