<?php

namespace Core;

use App\Models\Users;
use \DateTime;


class H
{
  public static function dnd($data = [], $die = true)
  {
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    if ($die) {
      die();
    }
  }

  /**
   * limits Length of String to specified limit $length 
   * @method limitStringLength
   * @param  string      $x          Specifies the string to return a part of
   * @param  integer      $length     Specifies the length of the returned string.The length to be returned from the start parameter
   * @return string      Returns the extracted part of a string, or FALSE on failure, or an empty string
   */
  public static function limitStringLength($x, $length)
  {
    if (strlen($x) <= $length) {
      return $x;
    } else {
      $y = substr($x, 0, $length) . '...';
      /*
        * The substr() function returns a part of a string. 
        * SYNTAX:substr(string,start,length)
             1. string	Required. Specifies the string to return a part of
             2. start	Required. Specifies where to start in the string
                    (a) A positive number - Start at a specified position in the string
                    (b) A negative number - Start at a specified position from the end of the string
                    (c) 0 - Start at the first character in string
             3. length	Optional. Specifies the length of the returned string. Default is to the end of the string.
                    (a) A positive number - The length to be returned from the start parameter
                    (b) Negative number - The length to be returned from the end of the string
                    (c) If the length parameter is 0, NULL, or FALSE - it return an empty string 
          */
      return $y;
    }
  }

  /**
   * Get object properties as associative array
   * @method getObjectProperties
   * @param  object $obj Object to extract properties from
   * @return array       Associative array of properties
   */
  public static function getObjectProperties($obj)
  {
    return get_object_vars($obj);
  }


  /**
   * Get the current page URL from server request
   * @method currentPage
   * @return string Current page URI
   */
  public static function currentPage()
  {
    $currentPage = $_SERVER['REQUEST_URI'];
    $defaultController = strtolower(DEFAULT_CONTROLLER);
    
    // Normalize default controller paths
    if ($currentPage === SITE_ROOT || $currentPage === SITE_ROOT . $defaultController . '/index') {
      $currentPage = SITE_ROOT . $defaultController;
    }
    
    return $currentPage;
  }

   /**
   * Check if the given page/URL is the current active page
   * Supports wildcards using :id pattern (e.g., 'blog/details/:id')
   * @method isCurrentPage
   * @param  string  $page URL or path to check
   * @return boolean       True if page matches current URL
   */
  public static function isCurrentPage($page)
  {
    $currentPage = self::currentPage();
    
    // Handle wildcard patterns like 'controller/action/:id'
    if (!empty($page) && strpos($page, ':id') !== false) {
      $pattern = str_replace(':id', '', $page);
      return strpos($currentPage, $pattern) !== false;
    }
    
    // Exact match
    return $page === $currentPage;
  }

  /**
   * Returns class string with 'active' appended if page is current
   * @method activeClass
   * @param  string $page  URL to check against current page
   * @param  string $class Base CSS classes (optional)
   * @return string        Class string with 'active' if current page
   */
  public static function activeClass($page, $class = '')
  {
    $isActive = self::isCurrentPage($page);
    return $isActive ? trim($class . ' active') : $class;
  }

  /**
   * Generate a single navigation list item with proper active state
   * Uses string concatenation for optimal performance on small HTML
   * @method navItem
   * @param  string  $link            Relative URL (without SITE_ROOT)
   * @param  string  $label           Display text for the link
   * @param  boolean $isDropdownItem  Whether this is a dropdown item (default: false)
   * @param  array   $attrs           Additional HTML attributes (optional)
   * @return string                   HTML string for nav item
   */
  public static function navItem($link, $label, $isDropdownItem = false, $attrs = [])
  {
    $fullLink = SITE_ROOT . $link;
    $itemClass = $isDropdownItem ? 'dropdown-item' : 'nav-item';
    $activeClass = self::activeClass($link, $itemClass);
    
    // Process additional attributes
    $attrString = '';
    foreach ($attrs as $key => $value) {
      $attrString .= ' ' . ($key) . '="' . ($value) . '"';
    }
    
    $html = '<li class="' . ($activeClass) . '">';
    $html .= '<a href="' . ($fullLink) . '"' . $attrString . '>';
    $html .= ($label);
    $html .= '</a></li>';
    
    return $html;
  }

  /**
   * Build dynamic navigation menu list from array with dropdown support
   * Uses output buffering for better performance with larger menus
   * Parent dropdown gets 'active' class when any child item is active
   * @method buildMenuListItems
   * @param  array  $menu          Menu array from Router::getMenu()
   * @param  string $dropdownClass Additional CSS class for dropdowns (optional)
   * @return string                HTML string for complete navigation menu
   */
  public static function buildMenuListItems($menu, $dropdownClass = "")
  {
    $user = Users::currentUser();
    $username = $user ? "Hello " . $user->fname : '%USERNAME%';
    
    ob_start();
    
    foreach ($menu as $key => $val) {
      // Handle special %USERNAME% placeholder
      $displayKey = ($key === '%USERNAME%') ? $username : $key;

      if (is_array($val)) {
        // Check if any child item is active
        $hasActiveChild = false;
        foreach ($val as $subKey => $subVal) {
          // Skip separators when checking for active state
          if (strpos($subKey, 'separator') === 0 && $subVal === '') {
            continue;
          }
          if (self::isCurrentPage($subVal)) {
            $hasActiveChild = true;
            break;
          }
        }
        
        // Build dropdown menu item with active class if any child is active
        $dropdownActiveClass = $hasActiveChild ? ' active' : '';
        ?>
        <div class="nav-item has-dropdown<?= $dropdownActiveClass ?>" onclick="toggleDropdown(this)">
          <?= ($displayKey) ?>
          <div class="dropdown <?= ($dropdownClass) ?>">
            <?php foreach ($val as $subKey => $subVal): ?>
              <?php if (strpos($subKey, 'separator') === 0 && $subVal === ''): ?>
                <div class="dropdown-separator"></div>
              <?php else: ?>
                <?php $activeClass = self::isCurrentPage($subVal) ? 'active' : ''; ?>
                <a class="dropdown-item <?= $activeClass ?>" href="<?= ($subVal) ?>">
                  <?= ($subKey) ?>
                </a>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <?php
      } else {
        // Build regular menu item
        $activeClass = self::isCurrentPage($val) ? 'active' : '';
        ?>
        <a class="nav-item <?= $activeClass ?>" href="<?= ($val) ?>">
          <?= ($displayKey) ?>
        </a>
        <?php
      }
    }
    
    return ob_get_clean();
  }

  /**
   * Build sidebar navigation menu from array with dropdown support
   * Uses output buffering for cleaner PHP/HTML mixing
   * Parent dropdown gets 'active' class when any child item is active
   * @method buildSidebarListItems
   * @param  array  $menu          Menu array from Router::getMenu()
   * @param  string $dropdownClass Additional CSS class for dropdowns (optional)
   * @return string                HTML string for sidebar navigation
   */
  public static function buildSidebarListItems($menu, $dropdownClass = "")
  {
    $user = Users::currentUser();
    
    ob_start();
    
    // Add sidebar toggle only if user is logged in
    if ($user): ?>
      <div class="sidebar-item" id="sidebarToggle"> ≡ <span> RESIZE</span></div>
    <?php endif;

    foreach ($menu as $key => $val) {
      // Skip username menu items in sidebar
      if ($key === '%USERNAME%') {
        continue;
      }

      if (is_array($val)) {
        // Check if any child item is active
        $hasActiveChild = false;
        foreach ($val as $subKey => $subVal) {
          // Skip separators when checking for active state
          if (strpos($subKey, 'separator') === 0 && $subVal === '') {
            continue;
          }
          if (self::isCurrentPage($subVal)) {
            $hasActiveChild = true;
            break;
          }
        }
        
        // Build dropdown sidebar item with active class if any child is active
        $sidebarActiveClass = $hasActiveChild ? ' active' : '';
        ?>
        <div class="sidebar-item has-dropdown<?= $sidebarActiveClass ?>" onclick="toggleSidebarDropdown(this)">
          <?= ($key) ?>
          <div class="sidebar-dropdown <?= ($dropdownClass) ?>">
            <?php foreach ($val as $subKey => $subVal): ?>
              <?php if (strpos($subKey, 'separator') === 0 && $subVal === ''): ?>
                <div class="sidebar-separator"></div>
              <?php else: ?>
                <?php $activeClass = self::isCurrentPage($subVal) ? 'active' : ''; ?>
                <a class="sidebar-dropdown-item <?= $activeClass ?>" href="<?= ($subVal) ?>">
                  <?= ($subKey) ?>
                </a>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <?php
      } else {
        // Build regular sidebar item
        $activeClass = self::isCurrentPage($val) ? 'active' : '';
        ?>
        <a class="sidebar-item <?= $activeClass ?>" href="<?= ($val) ?>">
          <?= ($key) ?>
        </a>
        <?php
      }
    }
    
    return ob_get_clean();
  }


  public static function buildMenuListItems_BUP($menu, $dropdownClass = "")
  {
    ob_start();
    $currentPage = self::currentPage();
    foreach ($menu as $key => $val):
      $active = '';
      if ($key == '%USERNAME%') {
        $key = (Users::currentUser()) ? "Hello " . Users::currentUser()->fname : $key;
      }
      if (is_array($val)): ?>

        <div class="nav-item has-dropdown" onclick="toggleDropdown(this)"><?= $key ?>
          <div class="dropdown <?= $dropdownClass ?>">
            <?php foreach ($val as $k => $v):
              $active = ($v == $currentPage) ? 'active' : ''; ?>
              <?php if (substr($k, 0, 9) == 'separator'): ?>
                <div role="separator" class="dropdown-divider"></div>
              <?php else: ?>
                <a class="dropdown-item <?= $active ?>" href="<?= $v ?>"><?= $k ?></a>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
      <?php else:
        $active = ($val == $currentPage) ? 'active' : ''; ?>
        <a class="nav-item <?= $active ?>" href="<?= $val ?>"><?= $key ?></a>
      <?php endif; ?>
    <?php endforeach;
    return ob_get_clean();
  }

  public static function buildSidebarListItems_BUP($menu, $dropdownClass = "")
  {
    ob_start();
    $currentPage = self::currentPage();
    $user = Users::currentUser();

    // Add sidebar toggle only if user is logged in
    if ($user): ?>
      <div class="sidebar-item" id="sidebarToggle"> ≡ <span> RESIZE</span></div>
      <?php endif;

    foreach ($menu as $key => $val):
      // Skip username menu items in sidebar as requested
      if ($key === '%USERNAME%') {
        continue;
      }

      if (is_array($val)): ?>
        <div class="sidebar-item has-dropdown" onclick="toggleSidebarDropdown(this)"><?= $key ?>
          <div class="sidebar-dropdown <?= $dropdownClass ?>">
            <?php foreach ($val as $subKey => $subVal):
              $active = ($subVal === $currentPage) ? 'active' : ''; ?>
              <a class="sidebar-dropdown-item <?= $active ?>" href="<?= $subVal ?>"><?= $subKey ?></a>
            <?php endforeach; ?>
          </div>
        </div>
      <?php else:
        $active = ($val === $currentPage) ? 'active' : ''; ?>
        <a class="sidebar-item <?= $active ?>" href="<?= $val ?>"><?= $key ?></a>
      <?php endif; ?>
<?php endforeach;

    return ob_get_clean();
  }

  // ==================================================================
  // DATE AND TIME HELPER METHODS
  // ==================================================================

  /**
   * Convert month number to month name
   * @method getMonthName
   * @param  integer $monthNum Month number (1-12)
   * @return string            Full month name (e.g., 'January')
   */
  public static function getMonthName($monthNum)
  {
    return date("F", mktime(0, 0, 0, $monthNum, 10));
  }

  /**
   * Convert month number to month name using DateTime
   * Alternative method to getMonthName()
   * @method getMonthNamev2
   * @param  integer $monthNum Month number (1-12)
   * @return string            Full month name (e.g., 'January')
   */
  public static function getMonthNamev2($monthNum)
  {
    $dateObj = DateTime::createFromFormat('!m', $monthNum);
    return $dateObj->format('F');
  }


  /**
   * Get the last day of the month from a date string
   * @method getLastDayOfMonth
   * @param  string $dateString Date in Y-m-d format
   * @return string             Last day of month in Y-m-d format
   */
  public static function getLastDayOfMonth($dateString)
  {
    $date = new DateTime($dateString);
    $date->modify('last day of this month');
    return $date->format('Y-m-d');
  }
  
  /**
   * Get last day of month via month number and year
   * @method getLastDayViaMonthNum
   * @param  integer $monthNum Month number (1-12)
   * @param  integer $year     Four-digit year
   * @return string            Last day of month in Y-m-d format
   */
  public static function getLastDayViaMonthNum($monthNum, $year)
  {
    $monthNumString = date("m", mktime(0, 0, 0, $monthNum, 10));
    $dateString = $year . '-' . $monthNumString . '-01';
    $date = strtotime($dateString);
    return date("Y-m-t", $date);
  }
  
  /**
   * Get first day of month via month number and year
   * @method getFirstDayViaMonthNum
   * @param  integer $monthNum Month number (1-12)
   * @param  integer $year     Four-digit year
   * @return string            First day of month in Y-m-d format
   */
  public static function getFirstDayViaMonthNum($monthNum, $year)
  {
    $monthNumString = date("m", mktime(0, 0, 0, $monthNum, 10));
    return $year . '-' . $monthNumString . '-01';
  }



  public static function getEnumCaseName($enum_id, $enumClass)
  {

    $cases = $enumClass::cases();
    // $casesAry = ['' => '-Select-'];
    $EnumCaseName = '';
    foreach ($cases as $case) {
      // $casesAry[$case->value] = $case->name;
      if ($case->value === $enum_id) {
        $EnumCaseName = $case->name;
        return $EnumCaseName;
        //if we find a match, break our for loop
        break;
      }
    }
    // return $sectionPartial;
  }

  /**
   * Format a date string to a more readable format
   * @method formatDate
   * @param  string $date   Date string
   * @param  string $format Output format (default: 'M j, Y')
   * @return string         Formatted date string
   */
  public static function formatDate($date, $format = 'M j, Y')
  {
    if (empty($date) || $date === '0000-00-00' || $date === '0000-00-00 00:00:00') {
      return '';
    }
    return date($format, strtotime($date));
  }
  

  // formatDate
  public static function formatDatev2($dateString, $format = 'Y-m-d')
  {
    if (empty($dateString) || $dateString === '0000-00-00') {
      return '';
    }
    $date = new DateTime($dateString);
    return $date->format($format);
  }

  /**
   * Format a datetime string to include time
   * @method formatDateTime
   * @param  string $datetime Datetime string
   * @param  string $format   Output format (default: 'M j, Y g:i A')
   * @return string           Formatted datetime string
   */
  public static function formatDateTime($datetime, $format = 'M j, Y g:i A')
  {
    return self::formatDate($datetime, $format);
  }



  // formatCurrency
  public static function formatCurrency($amount, $decimalPlaces = 2, $currency = '')
  {
    // Format the number with specified decimal places
    $formattedAmount = number_format($amount, $decimalPlaces);

    // Add currency symbol based on currency code
    switch ($currency) {
      case 'USD':
        return '$' . $formattedAmount;
      case 'EUR':
        return '€' . $formattedAmount;
      case 'GBP':
        return '£' . $formattedAmount;
      case 'KES':
        return 'KSh ' . $formattedAmount;
        // Add more currencies as needed
      default:
        return $formattedAmount . ' ' . $currency; // Fallback to currency code if symbol not found
    }
  }

  // daysBetween
  public static function daysBetween($startDate, $endDate)
  {
    $start = new DateTime($startDate);
    $end = new DateTime($endDate);
    $interval = $start->diff($end);
    return $interval->days;
  }

  /**
   * Creates a status badge HTML element
   * @method statusBadge
   * @param  string $status    Status value (draft, confirmed, cancelled, etc.)
   * @param  string $type      (optional) Type of status for CSS class prefix
   * @return string            Returns HTML string with status badge
   */
  public static function statusBadge($status, $type = 'status')
  {
    if (empty($status)) {
      return '';
    }

    // Map status values to CSS classes and display text
    $badgeConfig = [
      'draft' => ['class' => 'status-warning', 'text' => 'Draft'],
      'pending' => ['class' => 'status-warning', 'text' => 'Pending'],
      'confirmed' => ['class' => 'status-success', 'text' => 'Confirmed'],
      'cancelled' => ['class' => 'status-danger', 'text' => 'Cancelled'],
      'posted' => ['class' => 'status-success', 'text' => 'Posted'],
      'reversed' => ['class' => 'status-warning', 'text' => 'Reversed'],
      'active' => ['class' => 'status-success', 'text' => 'Active'],
      'inactive' => ['class' => 'status-danger', 'text' => 'Inactive'],
    ];

    $config = isset($badgeConfig[$status]) ? $badgeConfig[$status] : [
      'class' => 'status-default',
      'text' => ucfirst(str_replace('_', ' ', $status))
    ];

    return '<span class="status-badge ' . $config['class'] . '">' . $config['text'] . '</span>';
  }

  /**
   * Creates a payment status badge HTML element
   * @method paymentStatusBadge
   * @param  string $paymentStatus Payment status value (unpaid, partial, paid)
   * @return string                Returns HTML string with payment status badge
   */
  public static function paymentStatusBadge($paymentStatus)
  {
    if (empty($paymentStatus)) {
      return '';
    }

    // Map payment status values to CSS classes and display text
    $badgeConfig = [
      'unpaid' => ['class' => 'status-danger', 'text' => 'Unpaid'],
      'partial' => ['class' => 'status-warning', 'text' => 'Partially Paid'],
      'paid' => ['class' => 'status-success', 'text' => 'Paid'],
    ];

    $config = isset($badgeConfig[$paymentStatus]) ? $badgeConfig[$paymentStatus] : [
      'class' => 'status-default',
      'text' => ucfirst(str_replace('_', ' ', $paymentStatus))
    ];

    return '<span class="status-badge ' . $config['class'] . '">' . $config['text'] . '</span>';
  }

  /**
   * Creates an application status badge HTML element
   * @method applicationStatusBadge
   * @param  string $applicationStatus Application status value (unapplied, partial, fully_applied)
   * @return string                    Returns HTML string with application status badge
   */
  public static function applicationStatusBadge($applicationStatus)
  {
    if (empty($applicationStatus)) {
      return '';
    }

    // Map application status values to CSS classes and display text
    $badgeConfig = [
      'unapplied' => ['class' => 'status-danger', 'text' => 'Unapplied'],
      'partial' => ['class' => 'status-warning', 'text' => 'Partially Applied'],
      'fully_applied' => ['class' => 'status-success', 'text' => 'Fully Applied'],
    ];

    $config = isset($badgeConfig[$applicationStatus]) ? $badgeConfig[$applicationStatus] : [
      'class' => 'status-default',
      'text' => ucfirst(str_replace('_', ' ', $applicationStatus))
    ];

    return '<span class="status-badge ' . $config['class'] . '">' . $config['text'] . '</span>';
  }


  //reviewApprovalStatusBadge
  /**
   * Creates a review/approval status badge HTML element with rejection support
   * @method reviewApprovalStatusBadge
   * @param  int    $status  Review/approval status (1 = approved/reviewed, 0 = pending/rejected)
   * @param  string $type    Type of badge ('review' or 'approval')
   * @param  string $action  Action taken ('accepted' or 'rejected' - optional)
   * @return string          Returns HTML string with status badge
   */
  public static function reviewApprovalStatusBadge($status, $type = 'review', $action = null)
  {
    if ($status === null || $status === '') {
      return '';
    }

    $status = (int)$status;

    // If action is specified (accepted/rejected), use it to determine display
    if ($action !== null && $action !== '') {
      if ($action === 'rejected') {
        $text = $type === 'approval' ? 'Rejected' : 'Rejected';
        $class = 'status-rejected';
        return '<span class="status-badge ' . $class . '">X ' . $text . '</span>';
      } else if ($action === 'accepted') {
        $text = $type === 'approval' ? 'Approved' : 'Reviewed';
        $class = 'status-success';
        return '<span class="status-badge ' . $class . '">✅ ' . $text . '</span>';
      }
    }

    // Legacy behavior: use status integer (1 = done, 0 = pending)
    if ($type === 'approval') {
      $text = ($status === 1) ? '✅ Approved' : 'X Pending';
    } else {
      $text = ($status === 1) ? '✅ Reviewed' : 'X Pending';
    }

    $class = ($status === 1) ? 'status-success' : 'status-danger';

    return '<span class="status-badge ' . $class . '">' . $text . '</span>';
  }
}
