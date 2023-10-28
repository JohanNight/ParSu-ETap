<?php

namespace App\Http\Controllers;

use App\Models\clientCategory;
use Illuminate\Http\Request;
use App\Models\clientInfo;
use App\Models\offices;
use App\Models\service1;

class SumOfAllData extends Controller
{
    //


    public function calculateClientSatisfaction()
    {
        $surveyData = clientInfo::all(); // Assuming you retrieve all survey data

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

    public function calculateClientCategory()
    {
        $surveyData = clientInfo::all(); // retrieve all survey data
        // $clientCategory = clientCategory::all(); //  retrieve all  data from the table  clients Category
        // $categoryCounts = [];

        $studenCount = 0;
        $facultyCount = 0;
        $personnnelCount = 0;
        $othersCount = 0;

        // foreach ($clientCategory as $category) {
        //     $categoryCounts[$category->category] = 0;
        // }

        // foreach ($surveyData as $surveyedOffice) {
        //     foreach ($clientCategory as $category) {
        //         if ($surveyedOffice->idCategoryFK == $category->id) {
        //             $categoryCounts[$category->category]++;
        //         }
        //     }
        // }

        // foreach ($clientCategory as $category) {
        //     foreach ($surveyData as $surveyedOffice) {
        //         if ($surveyedOffice->idCategoryFK == $category->id) {
        //             $categoryCounts[$category->category]++;
        //         }
        //     }
        // }

        foreach ($surveyData as $surveyedOffice) {
            if ($surveyedOffice->idCategoryFK == 4) {
                $othersCount++;
            } elseif ($surveyedOffice->idCategoryFK == 3) {
                $personnnelCount++;
            } elseif ($surveyedOffice->idCategoryFK == 2) {
                $facultyCount++;
            } else {
                $studenCount++;
            }
        }

        return [
            'Student' => $studenCount,
            'Faculty' => $facultyCount,
            'Personnel' => $personnnelCount,
            'Guest' => $othersCount,
        ];
    }
    public function calculatePerOfficeSurveyed()
    {
        $surveyData = clientInfo::all(); // retrieve all survey data
        $officeAvailable = offices::all();
        $officeCount = [];
        foreach ($officeAvailable as $offices) {
            $officeCount[$offices->officeAcronym] = 0;
        }

        //$office = $officeCount;
        foreach ($surveyData as $surveyed) {
            foreach ($officeAvailable as $offices) {
                if ($surveyed->idOfficeOrigin == $offices->officeAcronym) {
                    $officeCount[$offices->officeAcronym]++;
                }
            }
        }

        // dd($officeCount);
        return $officeCount;
    }

    public function calculatePerOfficeServiceSurveyed()
    {
        $surveyData = clientInfo::all(); //retrieve all survey data
        $serviceAvailable = service1::all();
        $serviceCount = [];
        foreach ($serviceAvailable as $service) {
            $serviceCount[$service->service_Title] = 0;
        }
        foreach ($surveyData as $surveyed) {
            foreach ($serviceAvailable as $service) {
                if ($surveyed->service_avail == $service->service_Title) {
                    $serviceCount[$service->service_Title]++;
                }
            }
        }
        return $serviceCount;
    }

    public function getCalculatePerOfficeSurveyed(Request $request)
    {
        // dd($request);
        $request->validate([
            'date_from' => 'required|date',
            'date_to' => 'required|date|after_or_equal:date_from',
        ]);

        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $surveyData = clientInfo::whereBetween('created_at', [$dateFrom, $dateTo])->get();
        $officeAvailable = offices::all();
        $officeCount = [];
        foreach ($officeAvailable as $offices) {
            $officeCount[$offices->officeAcronym] = 0;
        }

        //$office = $officeCount;
        foreach ($surveyData as $surveyed) {
            foreach ($officeAvailable as $offices) {
                if ($surveyed->idOfficeOrigin == $offices->officeAcronym) {
                    $officeCount[$offices->officeAcronym]++;
                }
            }
        }

        // dd($officeCount);
        return $officeCount;
    }

    public function getCalculateClientCategory(Request $request)
    {
        $request->validate([
            'date_from' => 'required|date',
            'date_to' => 'required|date|after_or_equal:date_from',
        ]);

        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $surveyData = clientInfo::whereBetween('created_at', [$dateFrom, $dateTo])->get(); // retrieve all survey data

        $studenCount = 0;
        $facultyCount = 0;
        $personnnelCount = 0;
        $othersCount = 0;


        foreach ($surveyData as $surveyedOffice) {
            if ($surveyedOffice->idCategoryFK == 4) {
                $othersCount++;
            } elseif ($surveyedOffice->idCategoryFK == 3) {
                $personnnelCount++;
            } elseif ($surveyedOffice->idCategoryFK == 2) {
                $facultyCount++;
            } else {
                $studenCount++;
            }
        }

        return [
            'Student' => $studenCount,
            'Faculty' => $facultyCount,
            'Personnel' => $personnnelCount,
            'Guest' => $othersCount,
        ];
    }

    public function getCalculateClientSatisfaction(Request $request)
    {
        $request->validate([
            'date_from' => 'required|date',
            'date_to' => 'required|date|after_or_equal:date_from',
        ]);

        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $surveyData = clientInfo::whereBetween('created_at', [$dateFrom, $dateTo])->get(); // retrieve all survey data

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

    public function getCalculatePerOfficeServiceSurveyed(Request $request)
    {

        $request->validate([
            'date_from' => 'required|date',
            'date_to' => 'required|date|after_or_equal:date_from',
        ]);

        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $surveyData = clientInfo::whereBetween('created_at', [$dateFrom, $dateTo])->get(); // retrieve all survey data
        $serviceAvailable = service1::all();
        $serviceCount = [];


        foreach ($serviceAvailable as $service) {
            $serviceCount[$service->service_Title] = 0;
        }
        foreach ($surveyData as $surveyed) {
            foreach ($serviceAvailable as $service) {
                if ($surveyed->service_avail == $service->service_Title) {
                    $serviceCount[$service->service_Title]++;
                }
            }
        }
        return $serviceCount;
    }
}
