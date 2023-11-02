<?php

namespace App\Http\Controllers;

use App\Models\clientCategory;
use App\Models\clientInfo;
use App\Models\service1;
use Illuminate\Http\Request;

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

        // $studenCount = 0;
        // $facultyCount = 0;
        // $personnnelCount = 0;
        // $othersCount = 0;

        // foreach ($surveyData as $surveyedOffice) {
        //     if ($surveyedOffice->idCategoryFK == 4) {
        //         $othersCount++;
        //     } elseif ($surveyedOffice->idCategoryFK == 3) {
        //         $personnnelCount++;
        //     } elseif ($surveyedOffice->idCategoryFK == 2) {
        //         $facultyCount++;
        //     } else {
        //         $studenCount++;
        //     }
        // }

        // return [
        //     'Student' => $studenCount,
        //     'Faculty' => $facultyCount,
        //     'Personnel' => $personnnelCount,
        //     'Guest' => $othersCount,
        // ];
        return $categoryCounts;
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
}
