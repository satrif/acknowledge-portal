<?php

namespace App\Livewire;

use Livewire\Component;

class SpasiboJournalList extends Component
{
    public function render()
    {
        $user = auth()->user();
        $hiringDate = $user->hiring_date; // Carbon-объект
        $today = now();

        // Если дата приема — сегодня, сразу возвращаем +5 лет
        if ($hiringDate->isBirthday($today)) {
            return view('livewire.spasibo-journal-list', [
                'next_anniversary_date' => $hiringDate->addYears(5)->format('Y.m.d'),
                'years' => 5,
            ]);
        }

        // Вычисляем, сколько лет прошло с даты приема
        $yearsPassed = $hiringDate->diffInYears($today);

        // Определяем следующий юбилей (кратный 5 годам)
        $nextAnniversaryYears = ceil(($yearsPassed + 1) / 5) * 5;

        // Получаем дату следующего юбилея
        $nextAnniversaryDate = $hiringDate->copy()->addYears($nextAnniversaryYears);

        // Если юбилей уже прошел в этом году, добавляем еще 5 лет
        if ($nextAnniversaryDate->lessThanOrEqualTo($today)) {
            $nextAnniversaryYears += 5;
            $nextAnniversaryDate = $hiringDate->copy()->addYears($nextAnniversaryYears);
        }

        return view('livewire.spasibo-journal-list', [
            'next_anniversary_date' => $nextAnniversaryDate->format('d.m.Y'),
            'years' => $nextAnniversaryYears,
        ]);
//        dd($next_aniv . ' ' . $today);

    }
}
