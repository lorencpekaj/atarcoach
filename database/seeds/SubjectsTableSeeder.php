<?php

use Illuminate\Database\Seeder;
use App\Subject;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::insert([
        	["subject" => "Accounting"],
			["subject" => "Agricultural and Horticultural Studies"],
			["subject" => "Art"],
			["subject" => "Biology"],
			["subject" => "Business Management"],
			["subject" => "Chemistry"],
			["subject" => "Classical Societies and Cultures"],
			["subject" => "Computing"],
			["subject" => "Computing: Informatics"],
			["subject" => "Computing: Software Development"],
			["subject" => "Dance"],
			["subject" => "Design and Technology"],
			["subject" => "Drama"],
			["subject" => "Economics"],
			["subject" => "English: Bridging English as an Additional Language"],
			["subject" => "English"],
			["subject" => "English (EAL)"],
			["subject" => "English Language"],
			["subject" => "English: Literature"],
			["subject" => "Environmental Science"],
			["subject" => "Food and Technology"],
			["subject" => "Geography"],
			["subject" => "Health and Human Development"],
			["subject" => "History: 20th Century History"],
			["subject" => "History: Ancient History"],
			["subject" => "History: Australian History"],
			["subject" => "History: Global Empires"],
			["subject" => "History: Rennaisance History"],
			["subject" => "History: Revolutions"],
			["subject" => "Industry and Enterprise Studies"],
			["subject" => "Legal Studies"],
			["subject" => "LOTE"],
			["subject" => "Mathematics: Foundation"],
			["subject" => "Mathematics: General Mathematics"],
			["subject" => "Mathematics: Mathematical Methods (CAS)"],
			["subject" => "Mathematics: Further Mathematics"],
			["subject" => "Mathematics: Specialist Mathematics"],
			["subject" => "Media"],
			["subject" => "Music: Music Performance"],
			["subject" => "Music: Investigation"],
			["subject" => "Music: Music Style and Composition"],
			["subject" => "Outdoor and Environmental Studies"],
			["subject" => "Philosophy"],
			["subject" => "Physical Education"],
			["subject" => "Politics: Australian and Global Politics"],
			["subject" => "Politics: Australian Politics"],
			["subject" => "Politics: Global Politics"],
			["subject" => "Physics"],
			["subject" => "Psychology"],
			["subject" => "Religion and Society"],
			["subject" => "Sociology"],
			["subject" => "Studio Arts"],
			["subject" => "Systems and Technology"],
			["subject" => "Texts and Traditions"],
			["subject" => "Theatre Studies"],
			["subject" => "Visual Communications and Design"],
			["subject" => "Vocational Education and Training (VET)"]
		]);
    }
}
