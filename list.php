<?php

// List array structure.
$list_items = [
  'type' => 'ol',
  'items' => [
    [
      'text' => 'India',
      'child' => [
        'type' => 'ol',
        'items' => [
          [
            'text' => 'Maharashtra',
            'child' => [
              'type' => 'ul',
              'items' => [
                [
                  'text' => 'Pune',
                ],
                [
                  'text' => 'Nashik',
                ],
              ],
            ],
          ],
          [
            'text' => 'Karnataka',
          ],
          [
            'text' => 'Rajasthan',
            'child' => [
              'type' => 'ul',
              'items' => [
                [
                  'text' => 'Pushkar',
                ],
              ],
            ],
          ],
        ]
      ]
    ],
    [
      'text' => 'US',
      'child' => [
        'type' => 'ul',
        'items' => [
          [
            'text' => 'New York',
          ],
          [
            'text' => 'Kansas',
          ],
        ],
      ],
    ],
    [
      'text' => 'Pakistan',
      'child' => [
        'type' => 'ol',
        'items' => [
          [
            'text' => 'Balochistan',
          ],
          [
            'text' => 'Punjab',
            'child' => [
              'type' => 'ul',
              'items' => [
                [
                  'text' => 'Lahore',
                ],
                [
                  'text' => 'Faisalabad',
                ],
              ],
            ],
          ],
        ],
      ],
    ]
  ],
];

// Logic to output list items from $list_items.

/**
 * Funtion to get list type.
 */
function get_list_type($arr) {
  if (array_key_exists('type',$arr)){
    return $arr['type'];
  }
  return NULL;
}

/**
 * Funtion to get list items.
 */
function get_items($arr) {
  if (array_key_exists('items',$arr)) {
    return $arr['items'];
  }
  return NULL;
}


/**
 *  Funtion to get child items in the list.
 */
function get_list_child($arr) {
  if (array_key_exists('child',$arr)){
    return $arr['child'];
  }
  return NULL;
}

$list_type = get_list_type($list_items);
if ($list_type != NULL) {
  echo "<".$list_type.">";
  $countries = get_items($list_items);
  for ($i = 0; $i < sizeof($countries); $i++){
    echo "<li>".$countries[$i]['text']."</li>";
    $country_child = get_list_child($countries[$i]);
    $country_child_type = get_List_type($country_child);
    echo "<".$country_child_type.">";
    $states = get_items($country_child);
    for($j=0;$j<sizeof($states);$j++){
      echo "<li>".$states[$j]['text']."</li>";
      $state_child = get_list_child($states[$j]);
      if ($state_child != NULL){
      		$state_child_type = get_list_type($state_child);
        	echo "<".$state_child_type.">";
        	$cities = get_items($state_child);
        	for ($k =0; $k < sizeof($cities);$k ++){
          echo "<li>".$cities[$k]['text']."</li>";
        }
        echo "</".$state_child_type.">";
      }
    }
    echo "</".$country_child_type.">";
  }
  echo "</".$list_type.">";
}
