<?php
namespace tonisormisson\addressform;


/**
 * Class AddressHelper
 * @package tonisormisson\addressform
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class AddressHelper
{


    /**
     * make the simple array list to DepDrop eatable list with id & name
     * @param $list
     * @return array
     */
    public function formatList($list)
    {
        $out = [];
        foreach ($list as  $key => $value) {
            $out[] = [
                'id' => $key,
                'name' => $value['name'],
            ];
        }
        return $out;
    }

}