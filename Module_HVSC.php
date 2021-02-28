<?php
namespace GDO\HVSC;

use GDO\Core\GDO_Module;

/**
 * HVSC Website.
 * @author gizmore
 * @version 6.10
 * @since 6.10
 */
final class Module_HVSC extends GDO_Module
{
    public $module_priority = 120;
    
    public function href_administrate_module() { return $this->href('Upload'); }

    public function getTheme() { return 'hvsc'; }
    public function onLoadLanguage() { return $this->loadLanguage('lang/hvsc'); }
    
    public function getDependencies()
    {
        return [
            'SID', 'Sevenzip',
            'Login', 'Register', 'Recovery', 'Admin',
        ];
    }
    
}
