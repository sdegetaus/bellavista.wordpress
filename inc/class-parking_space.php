<?php

if (!defined('ABSPATH')) {
  exit;
}

class Parking_Space
{
  /**
   * Post ID.
   */
  private int $id = 0;

  /**
   * Post Status.
   */
  private string $status = '';

  /**
   * Post Title.
   */
  private string $title = '';

  /**
   * Owner ID.
   */
  private int $owner = 0;

  /**
   * Current Tenant ID.
   */
  private int $current_tenant = 0;

  /**
   * Tariff.
   */
  private float $tariff = 0;

  /**
   * Load a Parking Space.
   */
  public function __construct(int $id = 0)
  {
    if (!is_numeric($id)) {
      throw new Exception("Non-numeric id: $id");
    }

    $id = absint($id);

    if ($id == 0) {
      throw new Exception("Invalid id: $id");
    }

    if (get_post_status($id) === false) {
      throw new Exception("Post with id $id was not found!");
    }

    $this->id = $id;
    $this->_load();
  }

  /**
   * Load data into class.
   * 
   * @return void 
   */
  protected function _load()
  {
    $id             = $this->get_id();
    $status         = $this->get_status();
    $title          = get_the_title($id);
    $owner          = get_field('owner', $id);
    $current_tenant = get_field('current_tenant', $id);
    $tariff         = get_field('tariff', $id);

    $this->set_status($status);
    $this->set_title($title);
    $this->set_owner($owner);
    $this->set_current_tenant($current_tenant);
    $this->set_tariff($tariff);
  }

  /**
   * Returns the unique ID for this post.
   *
   * @return int
   */
  public function get_id()
  {
    return $this->id;
  }

  /**
   * Get post status.
   * 
   * @return false|"publish"|"future"|"draft"|"pending"|"private"
   */
  public function get_status()
  {
    return get_post_status($this->get_id());
  }

  /**
   * Get title.
   * 
   * @return string 
   */
  public function get_title()
  {
    return $this->title;
  }

  /**
   * Get owner ID.
   * 
   * @return int 
   */
  public function get_owner()
  {
    return $this->owner;
  }

  /**
   * Get current tenant ID.
   * 
   * @return int 
   */
  public function get_current_tenant()
  {
    return $this->current_tenant;
  }

  /**
   * Get tariff.
   * 
   * @return float 
   */
  public function get_tariff()
  {
    return $this->tariff;
  }

  /**
   * Is currently being occupied. 
   * 
   * @return void 
   */
  public function is_available()
  {
    return $this->current_tenant === 0;
  }

  /**
   * Set Status.
   * 
   * @param string $value 
   * @return void 
   */
  public function set_status($value)
  {
    $this->status = strval($value);
  }

  /**
   * Set Title.
   * 
   * @param string $value 
   * @return void 
   */
  public function set_title($value)
  {
    $this->title = strval($value);
  }

  /**
   * Set Owner.
   * 
   * @param int $value 
   * @return void 
   */
  public function set_owner($value)
  {
    $this->owner = is_numeric($value) ? absint($value) : 0;
  }

  /**
   * Set Current Tenant.
   * 
   * @param int $value 
   * @return void 
   */
  public function set_current_tenant($value)
  {
    $this->current_tenant = is_numeric($value) ? absint($value) : 0;
  }

  /**
   * Set Tariff.
   * 
   * @param float $value 
   * @return void 
   */
  public function set_tariff($value)
  {
    $this->tariff = is_numeric($value) ? floatval($value) : 0;
  }

  /**
   * Save the current state to the database.
   * 
   * @return void 
   */
  public function save()
  {
  }
}
