<?php

use Illuminate\Support\Facades\DB;

function pre($arr)
{
    echo "<pre>";
    print_r($arr);
    die();
}

function getTopNavCat()
{
    $categories = DB::table('mcategories')
        ->where(['status' => 1])
        ->get();

    $subcategories = DB::table('scategories')
        ->where(['status' => 1])
        ->get();

    $sscategories = DB::table('sscategories')
        ->where(['status' => 1])
        ->get();

    // pre($categories); // Uncomment for debugging

    $str = buildTreeView($categories, $subcategories, $sscategories);
    return $str;
}

function buildTreeView($categories, $subcategories, $sscategories)
{
    $banner1 = asset('front_assets/imgs/banner/menu-banner-2.jpg');
    $banner2 = asset('front_assets/imgs/banner/menu-banner-3.jpg');

    $html = '<ul>';
    foreach ($categories as $cat) {
        $url = url("/multiple_product/" . encrypt($cat->name));
        $html .= '<li class="has-children"><a href="' . $url . '"><i class="surfsidemedia-font-dress"></i>' . $cat->name . '</a>';

        $html .= '<div class="dropdown-menu"><ul class="mega-menu d-lg-flex">';
        $html .= '<li class="mega-menu-col"><ul class="d-lg-flex">';

        $hasSubcategories = false;
        foreach ($subcategories as $sub) {
            if ($sub->mcategory_id == $cat->id) {
                $hasSubcategories = true;
                $subUrl = url("/multiple_product/" . encrypt($sub->s_name));
                $html .= '<li class="mega-menu-col"><ul>';
                $html .= '<li><a class="submenu-title" href="' . $subUrl . '">' . $sub->s_name . '</a>';

                $html .= '<ul>';
                foreach ($sscategories as $ssub) {
                    if ($ssub->scategory_id == $sub->id) {
                        $ssubUrl = url("/multiple_product/" . encrypt($ssub->ss_name));
                        $html .= '<li><a class="dropdown-item nav-link nav_item" href="' . $ssubUrl . '">' . $ssub->ss_name . '</a></li>';
                    }
                }
                $html .= '</ul></li>';
                $html .= '</ul></li>';
            }
        }

        $html .= '</ul></li>';
        $html .= '<li class="mega-menu-col col-lg-5">
                    <div class="header-banner2">
                        <img src="' . $banner1 . '" alt="menu_banner1">
                        <div class="banne_info">
                            <h6>10% Off</h6>
                            <h4>New Arrival</h4>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                    <div class="header-banner2">
                        <img src="' . $banner2 . '" alt="menu_banner2">
                        <div class="banne_info">
                            <h6>15% Off</h6>
                            <h4>Hot Deals</h4>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </li>';
        $html .= '</ul></div></li>';
    }
    $html .= '</ul>';

    return $html;
}

function ourCollections()
{
    // Fetch categories and subcategories from the database
    $categories = DB::table('mcategories')
        ->where('status', 1)
        ->orderBy('id', 'asc')
        ->limit(3)
        ->get();

    $subcategories = DB::table('scategories')
        ->where('status', 1)
        ->get();

    // Initialize the HTML variable
    $html = '';

    // Generate the HTML content
    foreach ($categories as $item) {
        $html .= '
        <li class="sub-mega-menu sub-mega-menu-width-22">
            <a class="menu-title" href="#">' . $item->name . '</a>';
        foreach ($subcategories as $sitem) {
            if ($item->id == $sitem->mcategory_id) {
                $html .= '<ul>
                            <li><a href="product-details.html">' . $sitem->s_name . '</a></li>
                          </ul>';
            }
        }
        $html .= '</li>';
    }

    // Return the generated HTML
    return $html;
}

?>
