<?php

class Section extends Eloquent {

	use SoftDeletingTrait;

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
	 * Define a relationship com a zone
	 * 
	 * */
	public function zone() {

		return $this->belongsTo('Zone');
	}

	/**
	 * Define a relationship com o eleitor
	 * 
	 * */
	public function voters() {

		return $this->hasMany('Voter');
	}

	/**
	 * Faz com que o código seja preenchido com zero a esquerda 
	 *
	 * */
	public function getIdAttribute($value)
	{

		return str_pad($value, 4, "0", STR_PAD_LEFT);
	}

}
