<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $table = 'parties';
    protected $guarded = [];

    public function en_name()
	{
		$name = PartyTranslation::where('party_id', $this->id)->where('locale', 'en')->first();
		return $name ? $name->party_name : null;
	}

	public function bn_name()
	{
		$name = PartyTranslation::where('party_id', $this->id)->where('locale', 'bn')->first();
		return $name ? $name->party_name : null;
	}

	public function en_address()
	{
		$address = PartyTranslation::where('party_id', $this->id)->where('locale', 'en')->first();
		return $address ? $address->address : null;
	}

	public function bn_address()
	{
		$address = PartyTranslation::where('party_id', $this->id)->where('locale', 'bn')->first();
		return $address ? $address->address : null;
	}

	public function en_secretary()
	{
		$secretary = PartyTranslation::where('party_id', $this->id)->where('locale', 'en')->first();
		return $secretary ? $secretary->secretary_general : null;
	}

	public function bn_secretary()
	{
		$secretary = PartyTranslation::where('party_id', $this->id)->where('locale', 'bn')->first();
		return $secretary ? $secretary->secretary_general : null;
	}

	public function en_president()
	{
		$president = PartyTranslation::where('party_id', $this->id)->where('locale', 'en')->first();
		return $president ? $president->president : null;
	}

	public function bn_president()
	{
		$president = PartyTranslation::where('party_id', $this->id)->where('locale', 'bn')->first();
		return $president ? $president->president : null;
	}

	public function bn_chairperson()
	{
		$chairperson = PartyTranslation::where('party_id', $this->id)->where('locale', 'bn')->first();
		return $chairperson ? $chairperson->chairperson : null;
	}

	public function en_chairperson()
	{
		$chairperson = PartyTranslation::where('party_id', $this->id)->where('locale', 'en')->first();
		return $chairperson ? $chairperson->chairperson : null;
	}

	public function bn_chairman()
	{
		$chairman = PartyTranslation::where('party_id', $this->id)->where('locale', 'bn')->first();
		return $chairman ? $chairman->chairman : null;
	}

	public function en_chairman()
	{
		$chairman = PartyTranslation::where('party_id', $this->id)->where('locale', 'en')->first();
		return $chairman ? $chairman->chairman : null;
	}

	public function bn_general_secretary()
	{
		$gs = PartyTranslation::where('party_id', $this->id)->where('locale', 'bn')->first();
		return $gs ? $gs->general_secretary : null;
	}

	public function en_general_secretary()
	{
		$gs = PartyTranslation::where('party_id', $this->id)->where('locale', 'en')->first();
		return $gs ? $gs->general_secretary : null;
	}

	public function bn_aamir()
	{
		$aamir = PartyTranslation::where('party_id', $this->id)->where('locale', 'bn')->first();
		return $aamir ? $aamir->aamir : null;
	}

	public function en_aamir()
	{
		$aamir = PartyTranslation::where('party_id', $this->id)->where('locale', 'en')->first();
		return $aamir ? $aamir->aamir : null;
	}

	public function bn_bod()
	{
		$bod = PartyTranslation::where('party_id', $this->id)->where('locale', 'bn')->first();
		return $bod ? $bod->bod : null;
	}

	public function en_bod()
	{
		$bod = PartyTranslation::where('party_id', $this->id)->where('locale', 'en')->first();
		return $bod ? $bod->bod : null;
	}

	public function translations()
    {
        return $this->hasMany(PartyTranslation::class);
    }
}
