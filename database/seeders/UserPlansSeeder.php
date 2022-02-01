<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserPlan;

class UserPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_plan = json_decode(file_get_contents('database/json/user_plans.json'));

        foreach ($user_plan->user_plans as $value) {
            UserPlan::create([
                "id" => $value->id,
                "user_id" => $value->user_id,
                "currency_id" => $value->currency_id,
                "next_user_plan_id" => $value->next_user_plan_id,
                "start_timestamp" => $value->start_timestamp,
                "end_timestamp" => $value->end_timestamp,
                "renewal_timestamp" => $value->renewal_timestamp,
                "renewal_price" => $value->renewal_price,
                "requires_invoice" => $value->requires_invoice,
                "status" => $value->status,
                "created" => $value->created,
                "modified" => $value->modified,
                "financiation" => $value->financiation,
                "status_financiation" => $value->status_financiation,
                "language" => $value->language,
                "nif" => $value->nif,
                "business_name" => $value->business_name,
                "pending_payment" => $value->pending_payment,
                "date_max_payment" => $value->date_max_payment,
                "proxim_start_timestamp" => $value->proxim_start_timestamp,
                "proxim_end_timestamp" => $value->proxim_end_timestamp,
                "proxim_renewal_timestamp" => $value->proxim_renewal_timestamp,
                "proxim_renewal_price" => $value->proxim_renewal_price,
                "credits_return" => $value->credits_return,
                "company_id" => $value->company_id,
                "cancel_employee" => $value->cancel_employee,
                "force_renovation" => $value->force_renovation,
                "date_canceled" => $value->date_canceled,
                "amount_confirm_canceled" => $value->amount_confirm_canceled,
                "credit_confirm_canceled" => $value->credit_confirm_canceled,
                "cost_center_id" => $value->cost_center_id
            ]);
        }
    }
}
