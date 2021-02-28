<?php
namespace GDO\HVSC\Method;

use GDO\Core\MethodAdmin;
use GDO\Form\GDT_Form;
use GDO\Form\MethodForm;
use GDO\Form\GDT_AntiCSRF;
use GDO\Form\GDT_Submit;
use GDO\File\GDT_File;
use GDO\Sevenzip\Module_Sevenzip;
use Archive7z\Archive7z;

/**
 * Upload a 7zip archive from HVSC.c64.com
 * @author gizmore
 */
final class Upload extends MethodForm
{
    use MethodAdmin;
    
    public function createForm(GDT_Form $form)
    {
        $form->addField(GDT_AntiCSRF::make());
        $form->addField(GDT_File::make('file'));
        $form->actions()->addField(GDT_Submit::make());
    }
    
    public function formValidated(GDT_Form $form)
    {
        # 0) Load 7zip
        Module_Sevenzip::instance()->include7ZIP();
        
        # 1) Copy to temp path
        /** @var $file \GDO\File\GDO_File **/
        $file = $form->getFormValue('file');
        $src = $file->getPath();
        $dest = $this->getModule()->tempPath('hvsc.7z');
        copy($src, $dest);
        
        # 2) Extract 7zip
        $archive = new Archive7z($dest);
        
        
        
        return $this->message('msg_hvsc_file_uploaded');
    }

}
