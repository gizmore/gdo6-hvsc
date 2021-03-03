<?php
namespace GDO\HVSC\Method;

use GDO\Table\MethodQueryTable;
use GDO\SID\GDO_SIDFile;

final class HVSCList extends MethodQueryTable
{
    public function gdoTable()
    {
        return GDO_SIDFile::table();
    }
    
}
