<?php

class Section extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sections';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];
	
	/**
	 * The fillable property specifies which attributes should
	 * be mass-assignable. This can be set at the class or
	 * instance level.
	 *
	 * @var array
	 */
	protected $fillable = ['address'];

	/**
	 * Define a relationship com a sessão
	 * 
	 * */
	public function sections() {

		return $this->hasMany('Section');
	}

}
