<?php

class Party extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'parties';

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
	protected $fillable = ['name', 'purpose', 'logo', 'abbreviation'];
	
	/**
	 * Define a relationship com tipo de candidato
	 * 
	 * */
	public function candidates() {

		return $this->hasMany('Candidate');
	}

	/**
	 * Faz com que o código seja preenchido com zero a esquerda 
	 *
	 * */
	public function getIdAttribute($value)
	{

		return str_pad($value, 2, "0", STR_PAD_LEFT);
	}

}
