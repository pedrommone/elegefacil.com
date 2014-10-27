<?php

class Zone extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'zones';

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
	protected $fillable = ['state', 'city'];

	/**
	 * Define a relationship com a sessão
	 * 
	 * */
	public function sections() {

		return $this->hasMany('Section');
	}

	/**
	 * Faz com que o código seja preenchido com zero a esquerda 
	 *
	 * */
	public function getIdAttribute($value)
	{

		return str_pad($value, 3, "0", STR_PAD_LEFT);
	}

}
