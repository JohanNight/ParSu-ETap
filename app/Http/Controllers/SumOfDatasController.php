<?php

namespace App\Http\Controllers;

use App\Models\Cc_Options;
use App\Models\clientCategory;
use App\Models\clientInfo;
use App\Models\service1;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SumOfDatasController extends Controller
{
    //

    public function getAnswerePerService($userOfficeId)
    {
        $surveyData = clientInfo::all(); // retrieve all survey data
        $services = service1::where('idOffice', $userOfficeId)->get();
        $serviceMade = [];

        foreach ($services  as $service) {
            $serviceMade[$service->serviceCode] = 0;
        }
        foreach ($surveyData as $surveyed) {
            foreach ($services as $serviced) {
                if ($surveyed->service_avail == $serviced->idServiceSpecification) {
                    $serviceMade[$serviced->serviceCode]++;
                }
            }
        }
        return $serviceMade;
    }
    public function getSatisfaction($userOfficeId)
    {
        $surveyData = clientInfo::where('idOfficeOrigin', $userOfficeId)->get(); // retrieve all survey data

        // Initialize counters for each category
        $stronglyAgreeCount = 0;
        $agreeCount = 0;
        $neutralCount = 0;
        $disagreeCount = 0;
        $stronglyDisagreeCount = 0;
        $notApplicableCount = 0;

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd0 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd0 == 4) {
                $agreeCount++;
            } elseif ($response->sqd0 == 3) {
                $neutralCount++;
            } elseif ($response->sqd0 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd0 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd1 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd1 == 4) {
                $agreeCount++;
            } elseif ($response->sqd1 == 3) {
                $neutralCount++;
            } elseif ($response->sqd1 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd1 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd2 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd2 == 4) {
                $agreeCount++;
            } elseif ($response->sqd2 == 3) {
                $neutralCount++;
            } elseif ($response->sqd2 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd2 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd3 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd3 == 4) {
                $agreeCount++;
            } elseif ($response->sqd3 == 3) {
                $neutralCount++;
            } elseif ($response->sqd3 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd3 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd4 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd4 == 4) {
                $agreeCount++;
            } elseif ($response->sqd4 == 3) {
                $neutralCount++;
            } elseif ($response->sqd4 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd4 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd5 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd5 == 4) {
                $agreeCount++;
            } elseif ($response->sqd5 == 3) {
                $neutralCount++;
            } elseif ($response->sqd5 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd5 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd6 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd6 == 4) {
                $agreeCount++;
            } elseif ($response->sqd6 == 3) {
                $neutralCount++;
            } elseif ($response->sqd6 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd6 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd7 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd7 == 4) {
                $agreeCount++;
            } elseif ($response->sqd7 == 3) {
                $neutralCount++;
            } elseif ($response->sqd7 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd7 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd8 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd8 == 4) {
                $agreeCount++;
            } elseif ($response->sqd8 == 3) {
                $neutralCount++;
            } elseif ($response->sqd8 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd8 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        // Return the counts
        return [
            'Strongly Agree' => $stronglyAgreeCount,
            'Agree' => $agreeCount,
            'Neutral' => $neutralCount,
            'Disagree' => $disagreeCount,
            'Strongly Disagree' => $stronglyDisagreeCount,
            'Not Applicable' => $notApplicableCount,
        ];
    }
    public function getClientCategory($userOfficeId)
    {
        $surveyData = clientInfo::where('idOfficeOrigin', $userOfficeId)->get(); // retrieve all survey data; 
        $clientCategory = clientCategory::all();
        $categoryCounts = [];
        foreach ($clientCategory as $Category) {
            $categoryCounts[$Category->category] = 0;
        }

        foreach ($surveyData as $surveyed) {
            foreach ($clientCategory as $category) {
                if ($surveyed->idCategoryFK == $category->idCategory) {
                    $categoryCounts[$category->category]++;
                }
            }
        }
        return $categoryCounts;
    }
    public function getCcRecord($userOfficeId)
    {
        $surveyData = clientInfo::where('idOfficeOrigin', $userOfficeId)->get(); // retrieve all survey data; 
        $ccOption = Cc_Options::all();
        $ccOptionCount = [];
        foreach ($ccOption as $option) {
            if ($option->option_text != null) {
                $ccOptionCount[$option->option_text] = 0;
            }
        }

        foreach ($surveyData as $surveyed) {
            foreach ($ccOption as $options) {
                if ($surveyed->cc1 == $options->id) {
                    $ccOptionCount[$options->option_text]++;
                }
                if ($surveyed->cc2 == $options->id) {
                    $ccOptionCount[$options->option_text]++;
                }
                if ($surveyed->cc3 == $options->id) {
                    $ccOptionCount[$options->option_text]++;
                }
            }
        }

        return $ccOptionCount;
    }

    public function getTotalClient($userOfficeId)
    {
        $totalClients = clientInfo::where('idOfficeOrigin', $userOfficeId)->get()->count(); // retrieve all survey data->count();
        return $totalClients;
    }

    public function getTotalAnswerePerService($request, $userOfficeId)
    {
        // $request->validate([
        //     'date_from' => 'required|date',
        //     'date_to' => 'required|date|after_or_equal:date_from',
        // ]);

        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $surveyData = clientInfo::all(); // retrieve all survey data
        $services = service1::where('idOffice', $userOfficeId)
            ->whereBetween('created_at', [$dateFrom, $dateTo])
            ->get();
        $serviceMade = [];

        foreach ($services  as $service) {
            $serviceMade[$service->serviceCode] = 0;
        }
        foreach ($surveyData as $surveyed) {
            foreach ($services as $serviced) {
                if ($surveyed->service_avail == $serviced->idServiceSpecification) {
                    $serviceMade[$serviced->serviceCode]++;
                }
            }
        }
        return $serviceMade;
    }

    public function getTotalSatisfaction($request, $userOfficeId)
    {
        // $request->validate([
        //     'date_from' => 'required|date',
        //     'date_to' => 'required|date|after_or_equal:date_from',
        // ]);

        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $surveyData = clientInfo::where('idOfficeOrigin', $userOfficeId)
            ->whereBetween('created_at', [$dateFrom, $dateTo])
            ->get(); // retrieve all survey data

        // Initialize counters for each category
        $stronglyAgreeCount = 0;
        $agreeCount = 0;
        $neutralCount = 0;
        $disagreeCount = 0;
        $stronglyDisagreeCount = 0;
        $notApplicableCount = 0;

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd0 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd0 == 4) {
                $agreeCount++;
            } elseif ($response->sqd0 == 3) {
                $neutralCount++;
            } elseif ($response->sqd0 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd0 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd1 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd1 == 4) {
                $agreeCount++;
            } elseif ($response->sqd1 == 3) {
                $neutralCount++;
            } elseif ($response->sqd1 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd1 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd2 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd2 == 4) {
                $agreeCount++;
            } elseif ($response->sqd2 == 3) {
                $neutralCount++;
            } elseif ($response->sqd2 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd2 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd3 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd3 == 4) {
                $agreeCount++;
            } elseif ($response->sqd3 == 3) {
                $neutralCount++;
            } elseif ($response->sqd3 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd3 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd4 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd4 == 4) {
                $agreeCount++;
            } elseif ($response->sqd4 == 3) {
                $neutralCount++;
            } elseif ($response->sqd4 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd4 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd5 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd5 == 4) {
                $agreeCount++;
            } elseif ($response->sqd5 == 3) {
                $neutralCount++;
            } elseif ($response->sqd5 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd5 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd6 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd6 == 4) {
                $agreeCount++;
            } elseif ($response->sqd6 == 3) {
                $neutralCount++;
            } elseif ($response->sqd6 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd6 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd7 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd7 == 4) {
                $agreeCount++;
            } elseif ($response->sqd7 == 3) {
                $neutralCount++;
            } elseif ($response->sqd7 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd7 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        foreach ($surveyData as $response) {

            // Determine the category based on the total score
            if ($response->sqd8 == 5) {
                $stronglyAgreeCount++;
            } elseif ($response->sqd8 == 4) {
                $agreeCount++;
            } elseif ($response->sqd8 == 3) {
                $neutralCount++;
            } elseif ($response->sqd8 == 2) {
                $disagreeCount++;
            } elseif ($response->sqd8 == 1) {
                $stronglyDisagreeCount++;
            } else {
                $notApplicableCount++;
            }
        }

        // Return the counts
        return [
            'Strongly Agree' => $stronglyAgreeCount,
            'Agree' => $agreeCount,
            'Neutral' => $neutralCount,
            'Disagree' => $disagreeCount,
            'Strongly Disagree' => $stronglyDisagreeCount,
            'Not Applicable' => $notApplicableCount,
        ];
    }

    public function getTotalClientCategory($request, $userOfficeId)
    {
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $surveyData = clientInfo::where('idOfficeOrigin', $userOfficeId)
            ->whereBetween('created_at', [$dateFrom, $dateTo])
            ->get();
        $clientCategory = clientCategory::all();
        $categoryCounts = [];
        foreach ($clientCategory as $Category) {
            $categoryCounts[$Category->category] = 0;
        }

        foreach ($surveyData as $surveyed) {
            foreach ($clientCategory as $category) {
                if ($surveyed->idCategoryFK == $category->idCategory) {
                    $categoryCounts[$category->category]++;
                }
            }
        }
        return $categoryCounts;
    }

    public function getOverAllClient($request, $userOfficeId)
    {
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $totalClients = clientInfo::where('idOfficeOrigin', $userOfficeId)
            ->whereBetween('created_at', [$dateFrom, $dateTo])
            ->get()->count(); // retrieve all survey data->count();
        return $totalClients;
    }

    public function getTotalCcRecord($request, $userOfficeId)
    {
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $surveyData = clientInfo::whereBetween('created_at', [$dateFrom, $dateTo])
            ->where('idOfficeOrigin', $userOfficeId)->get(); // retrieve all survey data; 
        $ccOption = Cc_Options::all();
        $ccOptionCount = [];
        foreach ($ccOption as $option) {
            if ($option->option_text != null) {
                $ccOptionCount[$option->option_text] = 0;
            }
        }

        foreach ($surveyData as $surveyed) {
            foreach ($ccOption as $options) {
                if ($surveyed->cc1 == $options->id) {
                    $ccOptionCount[$options->option_text]++;
                }
                if ($surveyed->cc2 == $options->id) {
                    $ccOptionCount[$options->option_text]++;
                }
                if ($surveyed->cc3 == $options->id) {
                    $ccOptionCount[$options->option_text]++;
                }
            }
        }

        return $ccOptionCount;
    }

    //PDF report

    public function getCalculateAnswerePerService($request, $userOfficeId)
    {

        $dateFrom = $request->input('Assess_From_date');
        $dateTo = $request->input('Assess_date_To');

        $surveyData = clientInfo::whereBetween('created_at', [$dateFrom, $dateTo])
            ->get(); // retrieve all survey data
        $services = service1::where('idOffice', $userOfficeId)
            ->get();
        $serviceMade = [];

        foreach ($services  as $service) {
            $serviceMade[$service->serviceTitle] = 0;
        }
        foreach ($surveyData as $surveyed) {
            foreach ($services as $serviced) {
                if ($surveyed->service_avail == $serviced->idServiceSpecification) {
                    $serviceMade[$serviced->serviceTitle]++;
                }
            }
        }
        return $serviceMade;
    }

    public function TotalAnswerePerService($request, $userOfficeId)
    {

        $dateFrom = $request->input('Assess_From_date');
        $dateTo = $request->input('Assess_date_To');

        $surveyData = clientInfo::whereBetween('created_at', [$dateFrom, $dateTo])
            ->where('idOfficeOrigin', $userOfficeId)
            ->get()
            ->count(); // retrieve all survey data


        return  $surveyData;
    }


    public function getCalculatePerCcRecord($request, $userOfficeId)
    {
        $dateFrom = $request->input('Assess_From_date');
        $dateTo = $request->input('Assess_date_To');

        $surveyData = clientInfo::whereBetween('created_at', [$dateFrom, $dateTo])
            ->where('idOfficeOrigin', $userOfficeId)->get(); // retrieve all survey data; 

        $CcOptions = Cc_Options::all();


        $cc1Data = [];
        $cc2Data = [];
        $cc3Data = [];

        foreach ($CcOptions as $CcOption) {
            if ($CcOption->option_text != null) {
                if ($CcOption->table_cc_question_id == 1) {
                    $cc1Data[$CcOption->option_text] = 0;
                }
                if ($CcOption->table_cc_question_id == 2) {
                    $cc2Data[$CcOption->option_text] = 0;
                }
                if ($CcOption->table_cc_question_id == 3) {
                    $cc3Data[$CcOption->option_text] = 0;
                }
            }
        }

        foreach ($surveyData as $survey) {
            foreach ($CcOptions as $CcOption) {
                if ($survey->cc1 == $CcOption->id) {
                    $cc1Data[$CcOption->option_text]++;
                }
                if ($survey->cc2 == $CcOption->id) {
                    $cc2Data[$CcOption->option_text]++;
                }
                if ($survey->cc3 == $CcOption->id) {
                    $cc3Data[$CcOption->option_text]++;
                }
            }
        }

        // Get separate sums for cc1, cc2, and cc3
        $totalCc1Response = array_sum($cc1Data);
        $totalCc2Response = array_sum($cc2Data);
        $totalCc3Response = array_sum($cc3Data);
        // Calculate percentages
        $totalResponses = $totalCc1Response + $totalCc2Response + $totalCc3Response;

        return [
            'cc1Data' => $cc1Data,
            'cc2Data' => $cc2Data,
            'cc3Data' => $cc3Data,
            'totalResponses' =>   $totalResponses,
        ];
    }

    public function getAllSQDResult($request, $userOfficeId)
    {
        $dateFrom = $request->input('Assess_From_date');
        $dateTo = $request->input('Assess_date_To');

        // Retrieve all survey questions
        $SQDquestions = SurveyQuestion::all();

        $dateRange = [$dateFrom, $dateTo];
        $sqdValues = [0, 1, 2, 3, 4, 5];
        $questionCounts = [];

        foreach ($SQDquestions as $question) {
            $questionCounts[$question->questions] = ['counts' => [], 'original_sum' => 0, 'multiplied_sum' => 0];

            foreach ($sqdValues as $value) {
                $count = DB::table('table_client_survey_information')
                    ->whereBetween('created_at', $dateRange)
                    ->where('sqd' . $question->id, $value)
                    ->where('idOfficeOrigin', $userOfficeId)
                    ->count();

                $questionCounts[$question->questions]['counts'][$value] = $count;
                $questionCounts[$question->questions]['original_sum'] += $count;
                $questionCounts[$question->questions]['multiplied_sum'] += $count * $value;
            }

            // Calculate the weighted average (rate)
            $totalCount = $questionCounts[$question->questions]['original_sum'];
            $totalCountWithoutZeros = array_sum($questionCounts[$question->questions]['counts']);

            // Prevent division by zero
            $questionCounts[$question->questions]['rate'] = $totalCountWithoutZeros > 0
                ? $questionCounts[$question->questions]['multiplied_sum'] / $totalCountWithoutZeros
                : 0;
        }

        //dd($questionCounts);
        return response()->json($questionCounts);
    }
}
