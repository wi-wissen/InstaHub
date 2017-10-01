<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        \DB::table('comments')->delete();
        
        \DB::table('comments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 81,
                'photo_id' => 2,
                'body' => 'Erster Blogeintrag hätte dazu gesagt: "Ich bin so aufgeregt."',
                'created_at' => '2017-09-22 08:32:28',
                'updated_at' => '2017-09-22 08:32:28',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 29,
                'photo_id' => 279,
                'body' => 'Marilyn Monroe hätte dazu gesagt: "Wo will man aber Weisheit finden, und wo ist die Stätte der Einsicht?"',
                'created_at' => '2017-08-26 15:00:06',
                'updated_at' => '2017-08-26 15:00:06',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 151,
                'photo_id' => 354,
                'body' => 'Abraham Lincoln hätte dazu gesagt: "Bevor du sprichst, denke siebenmal darüber nach!"',
                'created_at' => '2017-09-20 20:28:29',
                'updated_at' => '2017-09-20 20:28:29',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 61,
                'photo_id' => 144,
                'body' => 'Mother Teresa hätte dazu gesagt: "Nichts ist einem Menschen willkommener als ein Freund zur rechten Zeit."',
                'created_at' => '2017-09-16 21:05:20',
                'updated_at' => '2017-09-16 21:05:20',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 140,
                'photo_id' => 212,
                'body' => 'John F. Kennedy hätte dazu gesagt: "Das Alter ist eine Reisende der Nacht. die Erde verbirgt sich und der Himmel wird sichtbar."',
                'created_at' => '2017-09-05 00:25:15',
                'updated_at' => '2017-09-05 00:25:15',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 7,
                'photo_id' => 219,
                'body' => 'Martin Luther King hätte dazu gesagt: "Wer den anderen liebt, hat das Gesetz erfüllt."',
                'created_at' => '2017-09-06 13:16:04',
                'updated_at' => '2017-09-06 13:16:04',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 40,
                'photo_id' => 79,
                'body' => 'Nelson Mandela hätte dazu gesagt: "Offene Hände schenken mehr als saubere Finger."',
                'created_at' => '2017-09-01 02:07:00',
                'updated_at' => '2017-09-01 02:07:00',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 48,
                'photo_id' => 514,
                'body' => 'Winston Churchill hätte dazu gesagt: "Wer heile Hände hat, dem tut das Gift nichts an; Das Böse schadet nicht dem, der es nicht getan."',
                'created_at' => '2017-09-17 16:11:49',
                'updated_at' => '2017-09-17 16:11:49',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 174,
                'photo_id' => 156,
                'body' => 'Bill Gates hätte dazu gesagt: "Kummer verdaut man am besten, wenn man ihn in Wein auflöst."',
                'created_at' => '2017-09-10 21:43:38',
                'updated_at' => '2017-09-10 21:43:38',
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 32,
                'photo_id' => 94,
                'body' => 'Muhammad Ali hätte dazu gesagt: "Die Kunst der Weisheit besteht darin, zu wissen, was man übersehen muß."',
                'created_at' => '2017-09-20 11:57:05',
                'updated_at' => '2017-09-20 11:57:05',
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => 24,
                'photo_id' => 600,
                'body' => 'Mahatma Gandhi hätte dazu gesagt: "Grenzen der Technik: Ein Tauchsieder kocht auch nur mit Wasser."',
                'created_at' => '2017-09-09 02:57:00',
                'updated_at' => '2017-09-09 02:57:00',
            ),
            11 => 
            array (
                'id' => 12,
                'user_id' => 122,
                'photo_id' => 246,
                'body' => 'Margaret Thatcher hätte dazu gesagt: "Ein Haus wird gebaut, aber ein Zuhause wird geformt."',
                'created_at' => '2017-09-01 12:51:44',
                'updated_at' => '2017-09-01 12:51:44',
            ),
            12 => 
            array (
                'id' => 13,
                'user_id' => 3,
                'photo_id' => 636,
                'body' => 'Charles de Gaulle hätte dazu gesagt: "Bemerke, höre, schweige. Urteile wenig, frage viel."',
                'created_at' => '2017-09-23 08:41:12',
                'updated_at' => '2017-09-23 08:41:12',
            ),
            13 => 
            array (
                'id' => 14,
                'user_id' => 15,
                'photo_id' => 142,
                'body' => 'Christopher Columbus hätte dazu gesagt: "Es ist eine viel schlimmere Art des Stolzes, andere zu verkleinern, als sich selbst zu erheben."',
                'created_at' => '2017-09-08 11:33:12',
                'updated_at' => '2017-09-08 11:33:12',
            ),
            14 => 
            array (
                'id' => 15,
                'user_id' => 166,
                'photo_id' => 44,
                'body' => 'George Orwell hätte dazu gesagt: "In den Bau der Welt taugt nur der abgeschliffene Stein."',
                'created_at' => '2017-09-10 16:57:21',
                'updated_at' => '2017-09-10 16:57:21',
            ),
            15 => 
            array (
                'id' => 16,
                'user_id' => 97,
                'photo_id' => 277,
                'body' => 'Charles Darwin hätte dazu gesagt: "Doch schmecken muß man alles, heiß und kalt, wer jung kein Narr war, wird es, wenn er alt."',
                'created_at' => '2017-09-09 22:04:47',
                'updated_at' => '2017-09-09 22:04:47',
            ),
            16 => 
            array (
                'id' => 17,
                'user_id' => 28,
                'photo_id' => 502,
                'body' => 'Elvis Presley hätte dazu gesagt: "Gott ist der schweigende Partner bei allen großen Unternehmungen."',
                'created_at' => '2017-09-01 02:45:29',
                'updated_at' => '2017-09-01 02:45:29',
            ),
            17 => 
            array (
                'id' => 18,
                'user_id' => 102,
                'photo_id' => 595,
                'body' => 'Albert Einstein hätte dazu gesagt: "Es wäre dumm, sich über die Außenwelt zu ärgern. Sie kümmert sich nicht darum."',
                'created_at' => '2017-09-17 20:35:32',
                'updated_at' => '2017-09-17 20:35:32',
            ),
            18 => 
            array (
                'id' => 19,
                'user_id' => 18,
                'photo_id' => 61,
                'body' => 'Paul McCartney hätte dazu gesagt: "Mit jedem Tag des Älterwerdens, befürchte ich genauso zu werden wie alle Menschen."',
                'created_at' => '2017-09-01 12:34:07',
                'updated_at' => '2017-09-01 12:34:07',
            ),
            19 => 
            array (
                'id' => 20,
                'user_id' => 115,
                'photo_id' => 577,
                'body' => 'Plato hätte dazu gesagt: "Alkohol macht nicht nur viele Menschen unverträglich, er reduziert zum Glück auch die Anzahl der Unverträglichen."',
                'created_at' => '2017-08-30 14:14:41',
                'updated_at' => '2017-08-30 14:14:41',
            ),
            20 => 
            array (
                'id' => 21,
                'user_id' => 108,
                'photo_id' => 632,
                'body' => 'Queen Elizabeth hätte dazu gesagt: "Ich will den Namen Gottes loben mit einem Lied."',
                'created_at' => '2017-09-18 10:00:11',
                'updated_at' => '2017-09-18 10:00:11',
            ),
            21 => 
            array (
                'id' => 22,
                'user_id' => 150,
                'photo_id' => 340,
                'body' => 'Queen Victoria hätte dazu gesagt: "Im Kriege verlieren alle, auch die Sieger."',
                'created_at' => '2017-09-01 06:09:23',
                'updated_at' => '2017-09-01 06:09:23',
            ),
            22 => 
            array (
                'id' => 23,
                'user_id' => 59,
                'photo_id' => 227,
                'body' => 'John M Keynes hätte dazu gesagt: "Zum Empfangen und Geben ist der Mensch geschaffen, zu Wirksamkeit und Freude, zum Tun und zum Leiden."',
                'created_at' => '2017-09-05 00:05:29',
                'updated_at' => '2017-09-05 00:05:29',
            ),
            23 => 
            array (
                'id' => 24,
                'user_id' => 156,
                'photo_id' => 578,
                'body' => 'Mikhail Gorbachev hätte dazu gesagt: "Die Zeit ist ein großer Lehrer. Das Unglück: Sie tötet ihre Schüler."',
                'created_at' => '2017-09-19 23:00:00',
                'updated_at' => '2017-09-19 23:00:00',
            ),
            24 => 
            array (
                'id' => 25,
                'user_id' => 80,
                'photo_id' => 205,
                'body' => 'Jawaharlal Nehru hätte dazu gesagt: "Vergangenes Leid muß Wohlsein fühlen lehren. Wer nie gedarbt, ist ohne Freude reich."',
                'created_at' => '2017-09-10 08:55:52',
                'updated_at' => '2017-09-10 08:55:52',
            ),
            25 => 
            array (
                'id' => 26,
                'user_id' => 172,
                'photo_id' => 303,
                'body' => 'Leonardo da Vinci hätte dazu gesagt: "Die Natur ist ein Verschwender, der keine Kosten und Mühen scheut, um sein Werk in kürzester Zeit zu vollenden."',
                'created_at' => '2017-08-31 04:46:55',
                'updated_at' => '2017-08-31 04:46:55',
            ),
            26 => 
            array (
                'id' => 27,
                'user_id' => 40,
                'photo_id' => 440,
                'body' => 'Louis Pasteur hätte dazu gesagt: "Gilt es zu hören, sei der Erste. Sei der Letzte, wenn es zu reden gilt."',
                'created_at' => '2017-09-08 00:13:31',
                'updated_at' => '2017-09-08 00:13:31',
            ),
            27 => 
            array (
                'id' => 28,
                'user_id' => 184,
                'photo_id' => 566,
                'body' => 'Leo Tolstoy hätte dazu gesagt: "Der innere Friede hängt immer vom Menschen selbst ab: Der Mensch braucht zu seinem Glück im wahren Verstande nichts als ihn, und braucht, um ihn zu besitzen, nichts als sich."',
                'created_at' => '2017-09-16 18:47:54',
                'updated_at' => '2017-09-16 18:47:54',
            ),
            28 => 
            array (
                'id' => 29,
                'user_id' => 43,
                'photo_id' => 325,
                'body' => 'Pablo Picasso hätte dazu gesagt: "Man kann nicht dem Arbeitnehmer helfen, indem man den Arbeitgeber beseitigt."',
                'created_at' => '2017-08-28 13:24:44',
                'updated_at' => '2017-08-28 13:24:44',
            ),
            29 => 
            array (
                'id' => 30,
                'user_id' => 82,
                'photo_id' => 253,
                'body' => 'Vincent Van Gogh hätte dazu gesagt: "Wußten Sie schon, daß gerade ältere Herren junges Gemüse besonders schätzen?"',
                'created_at' => '2017-09-20 00:53:10',
                'updated_at' => '2017-09-20 00:53:10',
            ),
            30 => 
            array (
                'id' => 31,
                'user_id' => 62,
                'photo_id' => 627,
                'body' => 'Franklin D. Roosevelt hätte dazu gesagt: "Jesus sagte: Steh auf, nimm deine Bahre und geh! Sofort wurde der Mann gesund, nahm seine Bahre und ging."',
                'created_at' => '2017-09-11 08:16:06',
                'updated_at' => '2017-09-11 08:16:06',
            ),
            31 => 
            array (
                'id' => 32,
                'user_id' => 103,
                'photo_id' => 471,
                'body' => 'Pope John Paul II hätte dazu gesagt: "Das Gefallen am Schönen und die Macht der Liebe sind etwas Natürliches, weder befohlen noch verboten, denn die Herzen stehen in Gottes Hand, und er wendet sie."',
                'created_at' => '2017-09-06 15:18:00',
                'updated_at' => '2017-09-06 15:18:00',
            ),
            32 => 
            array (
                'id' => 33,
                'user_id' => 63,
                'photo_id' => 336,
                'body' => 'Thomas Edison hätte dazu gesagt: "Gut ist eine lange Wurst und eine kurze Predigt."',
                'created_at' => '2017-09-23 00:52:13',
                'updated_at' => '2017-09-23 00:52:13',
            ),
            33 => 
            array (
                'id' => 34,
                'user_id' => 101,
                'photo_id' => 493,
                'body' => 'Rosa Parks hätte dazu gesagt: "Wir sind nicht, wofür wir uns oft halten, doch wir sind viel mehr, als die meisten von uns ahnen."',
                'created_at' => '2017-09-20 01:25:26',
                'updated_at' => '2017-09-20 01:25:26',
            ),
            34 => 
            array (
                'id' => 35,
                'user_id' => 102,
                'photo_id' => 324,
                'body' => 'Aung San Suu Kyi hätte dazu gesagt: "Mäßige deinen Zorn; es fallen die Funken erst auf dich; auf den Feind, wenn sie je treffen, zuletzt."',
                'created_at' => '2017-08-26 19:08:27',
                'updated_at' => '2017-08-26 19:08:27',
            ),
            35 => 
            array (
                'id' => 36,
                'user_id' => 161,
                'photo_id' => 564,
                'body' => 'Lyndon Johnson hätte dazu gesagt: "Unter Umständen ist es für manches Kind am besten, wenn es gar nicht erzogen wird."',
                'created_at' => '2017-08-29 11:31:52',
                'updated_at' => '2017-08-29 11:31:52',
            ),
            36 => 
            array (
                'id' => 37,
                'user_id' => 133,
                'photo_id' => 437,
                'body' => 'Ludwig Beethoven hätte dazu gesagt: "Nirgends zeigt sich der Mensch empfindlicher als in seinem Egoismus, und durch nichts ist er leichter zu besiegen als durch ihn."',
                'created_at' => '2017-09-08 10:22:42',
                'updated_at' => '2017-09-08 10:22:42',
            ),
            37 => 
            array (
                'id' => 38,
                'user_id' => 154,
                'photo_id' => 318,
                'body' => 'Oprah Winfrey hätte dazu gesagt: "Ein guter Nachbar ist besser als viele böse Verwandten."',
                'created_at' => '2017-09-20 20:04:16',
                'updated_at' => '2017-09-20 20:04:16',
            ),
            38 => 
            array (
                'id' => 39,
                'user_id' => 83,
                'photo_id' => 546,
                'body' => 'Indira Gandhi hätte dazu gesagt: "Es regnet auf alle Dächer."',
                'created_at' => '2017-09-20 06:18:51',
                'updated_at' => '2017-09-20 06:18:51',
            ),
            39 => 
            array (
                'id' => 40,
                'user_id' => 54,
                'photo_id' => 532,
                'body' => 'Eva Peron hätte dazu gesagt: "Was man heute politische Ansichten nennt, ist meist nur der Ausdruck wirtschaftlicher und sozialer Interessen."',
                'created_at' => '2017-09-01 12:13:35',
                'updated_at' => '2017-09-01 12:13:35',
            ),
            40 => 
            array (
                'id' => 41,
                'user_id' => 193,
                'photo_id' => 220,
                'body' => 'Benazir Bhutto hätte dazu gesagt: "Und dann war da noch die Frustrierte, die sagte: "Ich habe nie bekommen, was ich wollte. Ich wollte, ich hätte das bekommen, was ich wollte. Aber nicht einmal das will ich."',
                'created_at' => '2017-09-13 00:11:35',
                'updated_at' => '2017-09-13 00:11:35',
            ),
            41 => 
            array (
                'id' => 42,
                'user_id' => 29,
                'photo_id' => 621,
                'body' => 'Desmond Tutu hätte dazu gesagt: "In dem ehelichen Leben soll das vereinigte Paar gleichsam eine einzige moralische Person ausmachen, welche durch den Verstand des Mannes und den Geschmack der Frauen belebt und regiert wird."',
                'created_at' => '2017-08-29 00:16:18',
                'updated_at' => '2017-08-29 00:16:18',
            ),
            42 => 
            array (
                'id' => 43,
                'user_id' => 193,
                'photo_id' => 510,
                'body' => 'Dalai Lama hätte dazu gesagt: "Nichts ist schwerer zu ertragen als Reißverschluß auf vollen Magen."',
                'created_at' => '2017-09-01 00:53:58',
                'updated_at' => '2017-09-01 00:53:58',
            ),
            43 => 
            array (
                'id' => 44,
                'user_id' => 171,
                'photo_id' => 529,
                'body' => 'Walt Disney hätte dazu gesagt: "Das Gewissen ist der Puls der Vernunft."',
                'created_at' => '2017-09-18 00:40:10',
                'updated_at' => '2017-09-18 00:40:10',
            ),
            44 => 
            array (
                'id' => 45,
                'user_id' => 72,
                'photo_id' => 115,
                'body' => 'Peter Sellers hätte dazu gesagt: "Wer mit dem Kopf durch die Wand will, holt sich nur Beulen."',
                'created_at' => '2017-09-09 04:30:02',
                'updated_at' => '2017-09-09 04:30:02',
            ),
            45 => 
            array (
                'id' => 46,
                'user_id' => 160,
                'photo_id' => 636,
                'body' => 'Barack Obama hätte dazu gesagt: "Nur ein Tor zertrümmert den Spiegel, wenn ihm das Spiegelbild mißfällt."',
                'created_at' => '2017-09-11 23:39:57',
                'updated_at' => '2017-09-11 23:39:57',
            ),
            46 => 
            array (
                'id' => 47,
                'user_id' => 117,
                'photo_id' => 361,
                'body' => 'Malcolm X hätte dazu gesagt: "Faulheit, Frauendienst, Kränklichkeit, zu große Anhänglichkeit an den Geburtsort, Genügsamkeit und Furchtsamkeit, diese sind sechs Hindernisse der Größe."',
                'created_at' => '2017-09-17 04:43:35',
                'updated_at' => '2017-09-17 04:43:35',
            ),
            47 => 
            array (
                'id' => 48,
                'user_id' => 77,
                'photo_id' => 172,
                'body' => 'J.K.Rowling hätte dazu gesagt: "Laß euch nicht mit falschen Göttern ein!"',
                'created_at' => '2017-09-09 19:43:07',
                'updated_at' => '2017-09-09 19:43:07',
            ),
            48 => 
            array (
                'id' => 49,
                'user_id' => 68,
                'photo_id' => 505,
                'body' => 'Richard Branson hätte dazu gesagt: "Wer sich entschieden hat, etwas zu tun, und an nichts anderes denkt, überwindet alle Hindernisse."',
                'created_at' => '2017-09-20 03:21:22',
                'updated_at' => '2017-09-20 03:21:22',
            ),
            49 => 
            array (
                'id' => 50,
                'user_id' => 56,
                'photo_id' => 70,
                'body' => 'Pele hätte dazu gesagt: "Würden die Pforten der Wahrnehmung gereinigt, erschiene den Menschen alles, wie es ist: unendlich."',
                'created_at' => '2017-09-12 08:50:33',
                'updated_at' => '2017-09-12 08:50:33',
            ),
            50 => 
            array (
                'id' => 51,
                'user_id' => 155,
                'photo_id' => 249,
                'body' => 'Angelina Jolie hätte dazu gesagt: "Es gibt nicht nur einen bunten Hund in der Welt."',
                'created_at' => '2017-09-12 06:41:13',
                'updated_at' => '2017-09-12 06:41:13',
            ),
            51 => 
            array (
                'id' => 52,
                'user_id' => 157,
                'photo_id' => 555,
                'body' => 'Jesse Owens hätte dazu gesagt: "Als Sklaven und Herren ihrer Eigenliebe leben die Menschen dahin, nicht um zu leben, sondern um andere glauben zu machen, sie hätten gelebt."',
                'created_at' => '2017-09-08 00:18:10',
                'updated_at' => '2017-09-08 00:18:10',
            ),
            52 => 
            array (
                'id' => 53,
                'user_id' => 131,
                'photo_id' => 407,
                'body' => 'Ernest Hemingway hätte dazu gesagt: "Du lebst nicht für dich allein auf Erden."',
                'created_at' => '2017-09-10 21:52:01',
                'updated_at' => '2017-09-10 21:52:01',
            ),
            53 => 
            array (
                'id' => 54,
                'user_id' => 126,
                'photo_id' => 201,
                'body' => 'John Lennon hätte dazu gesagt: "Was ist der Mensch, daß du seiner gedenkst?"',
                'created_at' => '2017-09-04 03:09:54',
                'updated_at' => '2017-09-04 03:09:54',
            ),
            54 => 
            array (
                'id' => 55,
                'user_id' => 91,
                'photo_id' => 242,
                'body' => 'Henry Ford hätte dazu gesagt: "Solange die Menschen sterben können und das Leben lieben, wird der Arzt verspottet und gut bezahlt werden."',
                'created_at' => '2017-09-20 03:32:51',
                'updated_at' => '2017-09-20 03:32:51',
            ),
            55 => 
            array (
                'id' => 56,
                'user_id' => 46,
                'photo_id' => 124,
                'body' => 'Haile Selassie hätte dazu gesagt: "Gastsein ist gut. Heimkommen ist besser."',
                'created_at' => '2017-08-25 02:34:25',
                'updated_at' => '2017-08-25 02:34:25',
            ),
            56 => 
            array (
                'id' => 57,
                'user_id' => 182,
                'photo_id' => 3,
                'body' => 'Joseph Stalin hätte dazu gesagt: "Wer die Vergangenheit preist, tadelt die Gegenwart."',
                'created_at' => '2017-09-18 12:36:21',
                'updated_at' => '2017-09-18 12:36:21',
            ),
            57 => 
            array (
                'id' => 58,
                'user_id' => 187,
                'photo_id' => 119,
                'body' => 'Lord Baden Powell hätte dazu gesagt: "Beten heißt, liebend an Jesus denken."',
                'created_at' => '2017-09-07 03:06:55',
                'updated_at' => '2017-09-07 03:06:55',
            ),
            58 => 
            array (
                'id' => 59,
                'user_id' => 98,
                'photo_id' => 525,
                'body' => 'Michael Jordon hätte dazu gesagt: "Ich bin nicht entmutigt, weil jeder als falsch verworfene Versuch ein weiterer Schritt vorwärts ist."',
                'created_at' => '2017-09-15 06:53:24',
                'updated_at' => '2017-09-15 06:53:24',
            ),
            59 => 
            array (
                'id' => 60,
                'user_id' => 105,
                'photo_id' => 201,
                'body' => 'V.Lenin hätte dazu gesagt: "Doppelt lebt, wer auch Vergangenes genießt."',
                'created_at' => '2017-09-15 14:14:37',
                'updated_at' => '2017-09-15 14:14:37',
            ),
            60 => 
            array (
                'id' => 61,
                'user_id' => 172,
                'photo_id' => 369,
                'body' => 'Ingrid Bergman hätte dazu gesagt: "Der Busch hat Augen, der Baumstumpf trägt einen Hut."',
                'created_at' => '2017-09-22 04:52:55',
                'updated_at' => '2017-09-22 04:52:55',
            ),
            61 => 
            array (
                'id' => 62,
                'user_id' => 12,
                'photo_id' => 348,
                'body' => 'Fidel Castro hätte dazu gesagt: "Die Nacht ist die Mutter von Gedanken."',
                'created_at' => '2017-08-27 09:46:12',
                'updated_at' => '2017-08-27 09:46:12',
            ),
            62 => 
            array (
                'id' => 63,
                'user_id' => 161,
                'photo_id' => 48,
                'body' => 'Oscar Wilde hätte dazu gesagt: "Das Leben ist eine große Gelegenheit, und es ist sehr schade, wenn der Mensch das erst zu spät erkennt."',
                'created_at' => '2017-09-03 16:46:11',
                'updated_at' => '2017-09-03 16:46:11',
            ),
            63 => 
            array (
                'id' => 64,
                'user_id' => 104,
                'photo_id' => 92,
                'body' => 'Coco Chanel hätte dazu gesagt: "Herr, ich rufe zu dir. Eile mir zur Hilfe; höre auf meine Stimme, wenn ich zu dir rufe."',
                'created_at' => '2017-08-26 09:21:25',
                'updated_at' => '2017-08-26 09:21:25',
            ),
            64 => 
            array (
                'id' => 65,
                'user_id' => 174,
                'photo_id' => 531,
                'body' => 'Pope Francis hätte dazu gesagt: "Seit zehn Jahren versuchen viele Ostdeutsche möglichst schnell Wessis zu werden. Natürlich ohne ihre Identität dabei aufzugeben. Hundertprozentig ist das jedoch nur ganz wenigen gelungen. Aber immerhin gibt es inzwischen i',
                'created_at' => '2017-09-14 07:46:01',
                'updated_at' => '2017-09-14 07:46:01',
            ),
            65 => 
            array (
                'id' => 66,
                'user_id' => 120,
                'photo_id' => 133,
                'body' => 'Amelia Earhart hätte dazu gesagt: "Verlaßt euch nicht auf Gewalt!"',
                'created_at' => '2017-09-01 02:52:26',
                'updated_at' => '2017-09-01 02:52:26',
            ),
            66 => 
            array (
                'id' => 67,
                'user_id' => 156,
                'photo_id' => 588,
                'body' => 'Adolf Hitler hätte dazu gesagt: "Ermuntert einander mit Psalmen und Lobgesängen und geistlichen Liedern, singt und spielt dem Herrn in euren Herzen."',
                'created_at' => '2017-09-05 11:11:18',
                'updated_at' => '2017-09-05 11:11:18',
            ),
            67 => 
            array (
                'id' => 68,
                'user_id' => 151,
                'photo_id' => 473,
                'body' => 'Sting hätte dazu gesagt: "Das einzige Mittel, den Irrtum zu vermeiden, ist die Unwissenheit."',
                'created_at' => '2017-09-18 07:57:14',
                'updated_at' => '2017-09-18 07:57:14',
            ),
            68 => 
            array (
                'id' => 69,
                'user_id' => 116,
                'photo_id' => 161,
                'body' => 'Mary Magdalene hätte dazu gesagt: "Willst du fremde Fehler zählen, heb an deinen an zu zählen. Ist mir recht, wird dir die Weile zu den fremden Fehlern fehlen."',
                'created_at' => '2017-09-09 16:21:26',
                'updated_at' => '2017-09-09 16:21:26',
            ),
            69 => 
            array (
                'id' => 70,
                'user_id' => 170,
                'photo_id' => 12,
                'body' => 'Alfred Hitchcock hätte dazu gesagt: "Trau niemals einem Menschen, der sich die Haare färbt. Er färbt auch seine Gefühle."',
                'created_at' => '2017-09-15 17:12:20',
                'updated_at' => '2017-09-15 17:12:20',
            ),
            70 => 
            array (
                'id' => 71,
                'user_id' => 1,
                'photo_id' => 353,
                'body' => 'Michael Jackson hätte dazu gesagt: "Treibt uns der Ehrgeiz zur Einsamkeit? Die Antwort muß lauten: Ja! Denn was ist ihm mehr zuwider als Gemeinsamkeit? Was ist ihm wichtiger als Bewegungsfreiheit?"',
                'created_at' => '2017-09-11 10:30:37',
                'updated_at' => '2017-09-11 10:30:37',
            ),
            71 => 
            array (
                'id' => 72,
                'user_id' => 84,
                'photo_id' => 60,
                'body' => 'Madonna hätte dazu gesagt: "Was ein Leben an Länge gewinnt, verliert es meist an Tiefe."',
                'created_at' => '2017-09-11 15:51:12',
                'updated_at' => '2017-09-11 15:51:12',
            ),
            72 => 
            array (
                'id' => 73,
                'user_id' => 163,
                'photo_id' => 457,
                'body' => 'Mata Hari hätte dazu gesagt: "Die Vergangenheit und die Erinnerung haben eine unendliche Kraft, und wenn auch schmerzliche Sehnsucht daraus quillt, sich ihnen hinzugeben, so liegt darin doch ein unaussprechlich süßer Genuß."',
                'created_at' => '2017-09-13 10:42:47',
                'updated_at' => '2017-09-13 10:42:47',
            ),
            73 => 
            array (
                'id' => 74,
                'user_id' => 32,
                'photo_id' => 363,
                'body' => 'Cleopatra hätte dazu gesagt: "Im Wald lehnt sich Baum an Baum, also warum nicht Mensch an Mensch?"',
                'created_at' => '2017-09-21 04:06:01',
                'updated_at' => '2017-09-21 04:06:01',
            ),
            74 => 
            array (
                'id' => 75,
                'user_id' => 44,
                'photo_id' => 303,
                'body' => 'Grace Kelly hätte dazu gesagt: "Nur der, der gar nichts tut, macht einen Fehler."',
                'created_at' => '2017-09-19 18:01:12',
                'updated_at' => '2017-09-19 18:01:12',
            ),
            75 => 
            array (
                'id' => 76,
                'user_id' => 1,
                'photo_id' => 29,
                'body' => 'Steve Jobs hätte dazu gesagt: "Wer sich getroffen fühlt, ist gemeint."',
                'created_at' => '2017-08-26 00:21:19',
                'updated_at' => '2017-08-26 00:21:19',
            ),
            76 => 
            array (
                'id' => 77,
                'user_id' => 54,
                'photo_id' => 519,
                'body' => 'Ronald Reagan hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-23 04:08:43',
                'updated_at' => '2017-09-23 04:08:43',
            ),
            77 => 
            array (
                'id' => 78,
                'user_id' => 45,
                'photo_id' => 268,
                'body' => 'Lionel Messi hätte dazu gesagt: "Bin, der mich sagen hört, »umsonst« – heißt »gratis«, doch auch »vergeblich« –, Gnade wie Nichtigkeit gleichermaßen."',
                'created_at' => '2017-09-15 00:30:31',
                'updated_at' => '2017-09-15 00:30:31',
            ),
            78 => 
            array (
                'id' => 79,
                'user_id' => 91,
                'photo_id' => 18,
                'body' => 'Babe Ruth hätte dazu gesagt: "Sein Leid in sich fressen."',
                'created_at' => '2017-09-09 23:18:04',
                'updated_at' => '2017-09-09 23:18:04',
            ),
            79 => 
            array (
                'id' => 80,
                'user_id' => 18,
                'photo_id' => 517,
                'body' => 'Bob Geldof hätte dazu gesagt: "Solang ein Weib liebt, liebt es in einem fort – ein Mann hat dazwischen zu tun."',
                'created_at' => '2017-09-12 22:31:34',
                'updated_at' => '2017-09-12 22:31:34',
            ),
            80 => 
            array (
                'id' => 81,
                'user_id' => 189,
                'photo_id' => 626,
                'body' => 'Roger Federer hätte dazu gesagt: "Mit Fristgeben gedeiht der Handel."',
                'created_at' => '2017-09-11 09:27:46',
                'updated_at' => '2017-09-11 09:27:46',
            ),
            81 => 
            array (
                'id' => 82,
                'user_id' => 93,
                'photo_id' => 321,
                'body' => 'Sigmund Freud hätte dazu gesagt: "Flausen im Kopf sorgen für die Federung des Denkapparates."',
                'created_at' => '2017-09-23 09:33:09',
                'updated_at' => '2017-09-23 09:33:09',
            ),
            82 => 
            array (
                'id' => 83,
                'user_id' => 191,
                'photo_id' => 57,
                'body' => 'Woodrow Wilson hätte dazu gesagt: "Wer sich nicht schämt, etwas nicht zu können, und sich nicht ärgert, etwas nicht zu können, der kommt voran."',
                'created_at' => '2017-09-03 03:03:14',
                'updated_at' => '2017-09-03 03:03:14',
            ),
            83 => 
            array (
                'id' => 84,
                'user_id' => 76,
                'photo_id' => 465,
                'body' => 'Mao Zedong hätte dazu gesagt: "Werden die Eisheiligen im Hundertjährigen Eskimo-Kalender als heiße Jungs aufgeführt?"',
                'created_at' => '2017-09-07 10:25:09',
                'updated_at' => '2017-09-07 10:25:09',
            ),
            84 => 
            array (
                'id' => 85,
                'user_id' => 19,
                'photo_id' => 617,
                'body' => 'Katherine Hepburn hätte dazu gesagt: "Viele verabschieden sich von dieser Welt, ohne jemals etwas gesagt zu haben."',
                'created_at' => '2017-09-17 07:34:35',
                'updated_at' => '2017-09-17 07:34:35',
            ),
            85 => 
            array (
                'id' => 86,
                'user_id' => 120,
                'photo_id' => 299,
                'body' => 'Audrey Hepburn hätte dazu gesagt: "Es ist weise, das Glück wahrzunehmen, das unser Herrgott einem zuschickt."',
                'created_at' => '2017-09-16 16:38:32',
                'updated_at' => '2017-09-16 16:38:32',
            ),
            86 => 
            array (
                'id' => 87,
                'user_id' => 127,
                'photo_id' => 193,
                'body' => 'David Beckham hätte dazu gesagt: "Rache ist teuer."',
                'created_at' => '2017-09-21 19:47:44',
                'updated_at' => '2017-09-21 19:47:44',
            ),
            87 => 
            array (
                'id' => 88,
                'user_id' => 134,
                'photo_id' => 289,
                'body' => 'Usain Bolt hätte dazu gesagt: "Die Macht ist bei den Fröhlichen."',
                'created_at' => '2017-09-04 02:52:00',
                'updated_at' => '2017-09-04 02:52:00',
            ),
            88 => 
            array (
                'id' => 89,
                'user_id' => 168,
                'photo_id' => 530,
                'body' => 'Carl Lewis hätte dazu gesagt: "Wenn du ein Geheimnis nicht bewahren willst, dann sag es einer Frau."',
                'created_at' => '2017-09-15 11:50:39',
                'updated_at' => '2017-09-15 11:50:39',
            ),
            89 => 
            array (
                'id' => 90,
                'user_id' => 193,
                'photo_id' => 245,
                'body' => 'Prince Charles hätte dazu gesagt: "Wenn man nichts hat, was man liebt, muß man lieben, was man hat."',
                'created_at' => '2017-09-20 08:27:15',
                'updated_at' => '2017-09-20 08:27:15',
            ),
            90 => 
            array (
                'id' => 91,
                'user_id' => 107,
                'photo_id' => 229,
                'body' => 'Jacqueline Kennedy Onassis hätte dazu gesagt: "Ein guter Anfang ist ein halber Erfolg."',
                'created_at' => '2017-08-29 12:45:33',
                'updated_at' => '2017-08-29 12:45:33',
            ),
            91 => 
            array (
                'id' => 92,
                'user_id' => 109,
                'photo_id' => 594,
                'body' => 'C.S. Lewis hätte dazu gesagt: "Popularität hat für mich immer etwas Unbehagliches."',
                'created_at' => '2017-09-13 12:13:50',
                'updated_at' => '2017-09-13 12:13:50',
            ),
            92 => 
            array (
                'id' => 93,
                'user_id' => 50,
                'photo_id' => 647,
                'body' => 'Billie Holiday hätte dazu gesagt: "Die Ehre ist die Poesie der Pflicht!"',
                'created_at' => '2017-09-13 11:59:09',
                'updated_at' => '2017-09-13 11:59:09',
            ),
            93 => 
            array (
                'id' => 94,
                'user_id' => 128,
                'photo_id' => 420,
                'body' => 'J.R.R. Tolkien hätte dazu gesagt: "Ein Mensch ohne Geld ist wie ein Wolf ohne Zähne."',
                'created_at' => '2017-09-18 00:35:57',
                'updated_at' => '2017-09-18 00:35:57',
            ),
            94 => 
            array (
                'id' => 95,
                'user_id' => 183,
                'photo_id' => 26,
                'body' => 'Billie Jean King hätte dazu gesagt: "Es ist irrelevant, wie lange sich die Dummköpfe unter dem Baum der Weisheit und Barmherzigkeit aufhalten. Für sie wird kein einziger Apfel herunter fallen."',
                'created_at' => '2017-09-05 17:32:35',
                'updated_at' => '2017-09-05 17:32:35',
            ),
            95 => 
            array (
                'id' => 96,
                'user_id' => 65,
                'photo_id' => 600,
                'body' => 'Anne Frank hätte dazu gesagt: "Christus und Moses, alle Seher und Magier waren "in der Ruhe". Martha arbeitete sich ab - Maria baute sich auf. Darum sagte Christus von Maria, sie habe das bessere Teil erwählt, da sie sich nicht zur Hausmagd erniedrigte gl',
                'created_at' => '2017-09-22 18:02:49',
                'updated_at' => '2017-09-22 18:02:49',
            ),
            96 => 
            array (
                'id' => 97,
                'user_id' => 153,
                'photo_id' => 484,
                'body' => 'Simon Bolivar hätte dazu gesagt: "Wo du zu tadeln hast, komm und hilf!"',
                'created_at' => '2017-09-07 00:21:22',
                'updated_at' => '2017-09-07 00:21:22',
            ),
            97 => 
            array (
                'id' => 98,
                'user_id' => 36,
                'photo_id' => 474,
                'body' => 'Marie Antoinette hätte dazu gesagt: "Lebendig ist das Wort Gottes, kraftvoll und schärfer als jedes zweischneidige Schwert."',
                'created_at' => '2017-09-01 10:29:34',
                'updated_at' => '2017-09-01 10:29:34',
            ),
            98 => 
            array (
                'id' => 99,
                'user_id' => 92,
                'photo_id' => 161,
                'body' => 'Christiano Ronaldo hätte dazu gesagt: "Wer niemals außer sich gerät, wird niemals in sich gehen."',
                'created_at' => '2017-09-15 06:02:38',
                'updated_at' => '2017-09-15 06:02:38',
            ),
            99 => 
            array (
                'id' => 100,
                'user_id' => 56,
                'photo_id' => 662,
                'body' => 'Emmeline Pankhurst hätte dazu gesagt: "Wer nicht läuft, gelangt nie ans Ziel!"',
                'created_at' => '2017-09-21 07:57:19',
                'updated_at' => '2017-09-21 07:57:19',
            ),
            100 => 
            array (
                'id' => 101,
                'user_id' => 39,
                'photo_id' => 529,
                'body' => 'Emile Zatopek hätte dazu gesagt: "Machen Sie es sich zur Aufgabe, höheren Ansprüchen zu genügen, als andere an Sie stellen."',
                'created_at' => '2017-09-01 10:06:49',
                'updated_at' => '2017-09-01 10:06:49',
            ),
            101 => 
            array (
                'id' => 102,
                'user_id' => 34,
                'photo_id' => 25,
                'body' => 'Lech Walesa hätte dazu gesagt: "Laß die anderen in Ruhe, sorge für dich selbst."',
                'created_at' => '2017-08-26 03:21:42',
                'updated_at' => '2017-08-26 03:21:42',
            ),
            102 => 
            array (
                'id' => 103,
                'user_id' => 167,
                'photo_id' => 659,
                'body' => 'Julie Andrews hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-13 04:32:31',
                'updated_at' => '2017-09-13 04:32:31',
            ),
            103 => 
            array (
                'id' => 104,
                'user_id' => 139,
                'photo_id' => 434,
                'body' => 'Florence Nightingale hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-24 22:26:35',
                'updated_at' => '2017-09-24 22:26:35',
            ),
            104 => 
            array (
                'id' => 105,
                'user_id' => 72,
                'photo_id' => 527,
                'body' => 'Marie Curie hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-08-30 16:20:59',
                'updated_at' => '2017-08-30 16:20:59',
            ),
            105 => 
            array (
                'id' => 106,
                'user_id' => 37,
                'photo_id' => 272,
                'body' => 'Stephen Hawking hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-18 11:13:14',
                'updated_at' => '2017-09-18 11:13:14',
            ),
            106 => 
            array (
                'id' => 107,
                'user_id' => 179,
                'photo_id' => 666,
                'body' => 'Tim Berners Lee hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-21 13:00:28',
                'updated_at' => '2017-09-21 13:00:28',
            ),
            107 => 
            array (
                'id' => 108,
                'user_id' => 152,
                'photo_id' => 640,
                'body' => 'Lance Armstrong hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-06 20:29:19',
                'updated_at' => '2017-09-06 20:29:19',
            ),
            108 => 
            array (
                'id' => 109,
                'user_id' => 112,
                'photo_id' => 295,
                'body' => 'Shakira hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-07 21:31:15',
                'updated_at' => '2017-09-07 21:31:15',
            ),
            109 => 
            array (
                'id' => 110,
                'user_id' => 47,
                'photo_id' => 434,
                'body' => 'Jon Stewart hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-08 14:21:03',
                'updated_at' => '2017-09-08 14:21:03',
            ),
            110 => 
            array (
                'id' => 111,
                'user_id' => 42,
                'photo_id' => 470,
                'body' => 'Wright Brothers hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-08-27 06:07:16',
                'updated_at' => '2017-08-27 06:07:16',
            ),
            111 => 
            array (
                'id' => 112,
                'user_id' => 19,
                'photo_id' => 638,
                'body' => 'Paul Krugman hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-16 04:37:49',
                'updated_at' => '2017-09-16 04:37:49',
            ),
            112 => 
            array (
                'id' => 113,
                'user_id' => 26,
                'photo_id' => 15,
                'body' => 'Malala Yousafzai hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-20 01:28:12',
                'updated_at' => '2017-09-20 01:28:12',
            ),
            113 => 
            array (
                'id' => 114,
                'user_id' => 6,
                'photo_id' => 90,
                'body' => 'Marilyn Monroe hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-21 02:49:26',
                'updated_at' => '2017-09-21 02:49:26',
            ),
            114 => 
            array (
                'id' => 115,
                'user_id' => 70,
                'photo_id' => 401,
                'body' => 'Abraham Lincoln hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-17 17:05:40',
                'updated_at' => '2017-09-17 17:05:40',
            ),
            115 => 
            array (
                'id' => 116,
                'user_id' => 47,
                'photo_id' => 78,
                'body' => 'Mother Teresa hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-23 22:58:57',
                'updated_at' => '2017-09-23 22:58:57',
            ),
            116 => 
            array (
                'id' => 117,
                'user_id' => 5,
                'photo_id' => 250,
                'body' => 'John F. Kennedy hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-23 03:35:46',
                'updated_at' => '2017-09-23 03:35:46',
            ),
            117 => 
            array (
                'id' => 118,
                'user_id' => 30,
                'photo_id' => 332,
                'body' => 'Martin Luther King hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-19 08:00:44',
                'updated_at' => '2017-09-19 08:00:44',
            ),
            118 => 
            array (
                'id' => 119,
                'user_id' => 45,
                'photo_id' => 681,
                'body' => 'Nelson Mandela hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-21 00:08:20',
                'updated_at' => '2017-09-21 00:08:20',
            ),
            119 => 
            array (
                'id' => 120,
                'user_id' => 69,
                'photo_id' => 112,
                'body' => 'Winston Churchill hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-14 01:52:16',
                'updated_at' => '2017-09-14 01:52:16',
            ),
            120 => 
            array (
                'id' => 121,
                'user_id' => 87,
                'photo_id' => 162,
                'body' => 'Bill Gates hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-24 07:04:28',
                'updated_at' => '2017-09-24 07:04:28',
            ),
            121 => 
            array (
                'id' => 122,
                'user_id' => 116,
                'photo_id' => 468,
                'body' => 'Muhammad Ali hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-08 03:22:56',
                'updated_at' => '2017-09-08 03:22:56',
            ),
            122 => 
            array (
                'id' => 123,
                'user_id' => 157,
                'photo_id' => 482,
                'body' => 'Mahatma Gandhi hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-08-29 20:39:25',
                'updated_at' => '2017-08-29 20:39:25',
            ),
            123 => 
            array (
                'id' => 124,
                'user_id' => 15,
                'photo_id' => 187,
                'body' => 'Margaret Thatcher hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-08-30 04:33:41',
                'updated_at' => '2017-08-30 04:33:41',
            ),
            124 => 
            array (
                'id' => 125,
                'user_id' => 195,
                'photo_id' => 257,
                'body' => 'Charles de Gaulle hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 14:07:24',
                'updated_at' => '2017-09-15 14:07:24',
            ),
            125 => 
            array (
                'id' => 126,
                'user_id' => 43,
                'photo_id' => 387,
                'body' => 'Christopher Columbus hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-08-26 20:39:47',
                'updated_at' => '2017-08-26 20:39:47',
            ),
            126 => 
            array (
                'id' => 127,
                'user_id' => 15,
                'photo_id' => 458,
                'body' => 'George Orwell hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-14 17:35:47',
                'updated_at' => '2017-09-14 17:35:47',
            ),
            127 => 
            array (
                'id' => 128,
                'user_id' => 20,
                'photo_id' => 99,
                'body' => 'Charles Darwin hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-21 12:10:08',
                'updated_at' => '2017-09-21 12:10:08',
            ),
            128 => 
            array (
                'id' => 129,
                'user_id' => 36,
                'photo_id' => 589,
                'body' => 'Elvis Presley hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-08-31 09:30:12',
                'updated_at' => '2017-08-31 09:30:12',
            ),
            129 => 
            array (
                'id' => 130,
                'user_id' => 73,
                'photo_id' => 129,
                'body' => 'Albert Einstein hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-14 08:35:54',
                'updated_at' => '2017-09-14 08:35:54',
            ),
            130 => 
            array (
                'id' => 131,
                'user_id' => 13,
                'photo_id' => 288,
                'body' => 'Paul McCartney hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-08-26 22:14:11',
                'updated_at' => '2017-08-26 22:14:11',
            ),
            131 => 
            array (
                'id' => 132,
                'user_id' => 40,
                'photo_id' => 50,
                'body' => 'Plato hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-14 08:30:21',
                'updated_at' => '2017-09-14 08:30:21',
            ),
            132 => 
            array (
                'id' => 133,
                'user_id' => 93,
                'photo_id' => 10,
                'body' => 'Queen Elizabeth hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-08-30 21:31:34',
                'updated_at' => '2017-08-30 21:31:34',
            ),
            133 => 
            array (
                'id' => 134,
                'user_id' => 124,
                'photo_id' => 324,
                'body' => 'Queen Victoria hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-01 18:45:29',
                'updated_at' => '2017-09-01 18:45:29',
            ),
            134 => 
            array (
                'id' => 135,
                'user_id' => 14,
                'photo_id' => 43,
                'body' => 'John M Keynes hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-06 19:33:44',
                'updated_at' => '2017-09-06 19:33:44',
            ),
            135 => 
            array (
                'id' => 136,
                'user_id' => 38,
                'photo_id' => 664,
                'body' => 'Mikhail Gorbachev hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-22 21:44:42',
                'updated_at' => '2017-09-22 21:44:42',
            ),
            136 => 
            array (
                'id' => 137,
                'user_id' => 134,
                'photo_id' => 583,
                'body' => 'Jawaharlal Nehru hätte dazu gesagt: "Ich bin so aufgeregt."',
                'created_at' => '2017-09-11 21:26:58',
                'updated_at' => '2017-09-11 21:26:58',
            ),
            137 => 
            array (
                'id' => 138,
                'user_id' => 30,
                'photo_id' => 261,
                'body' => 'Leonardo da Vinci hätte dazu gesagt: "Wo will man aber Weisheit finden, und wo ist die Stätte der Einsicht?"',
                'created_at' => '2017-09-14 15:10:53',
                'updated_at' => '2017-09-14 15:10:53',
            ),
            138 => 
            array (
                'id' => 139,
                'user_id' => 46,
                'photo_id' => 587,
                'body' => 'Louis Pasteur hätte dazu gesagt: "Bevor du sprichst, denke siebenmal darüber nach!"',
                'created_at' => '2017-09-21 23:42:30',
                'updated_at' => '2017-09-21 23:42:30',
            ),
            139 => 
            array (
                'id' => 140,
                'user_id' => 76,
                'photo_id' => 1,
                'body' => 'Leo Tolstoy hätte dazu gesagt: "Nichts ist einem Menschen willkommener als ein Freund zur rechten Zeit."',
                'created_at' => '2017-08-27 20:39:03',
                'updated_at' => '2017-08-27 20:39:03',
            ),
            140 => 
            array (
                'id' => 141,
                'user_id' => 131,
                'photo_id' => 644,
                'body' => 'Pablo Picasso hätte dazu gesagt: "Das Alter ist eine Reisende der Nacht. die Erde verbirgt sich und der Himmel wird sichtbar."',
                'created_at' => '2017-09-11 18:24:33',
                'updated_at' => '2017-09-11 18:24:33',
            ),
            141 => 
            array (
                'id' => 142,
                'user_id' => 29,
                'photo_id' => 462,
                'body' => 'Vincent Van Gogh hätte dazu gesagt: "Wer den anderen liebt, hat das Gesetz erfüllt."',
                'created_at' => '2017-08-31 06:06:10',
                'updated_at' => '2017-08-31 06:06:10',
            ),
            142 => 
            array (
                'id' => 143,
                'user_id' => 126,
                'photo_id' => 680,
                'body' => 'Franklin D. Roosevelt hätte dazu gesagt: "Offene Hände schenken mehr als saubere Finger."',
                'created_at' => '2017-09-23 14:57:38',
                'updated_at' => '2017-09-23 14:57:38',
            ),
            143 => 
            array (
                'id' => 144,
                'user_id' => 67,
                'photo_id' => 329,
                'body' => 'Pope John Paul II hätte dazu gesagt: "Wer heile Hände hat, dem tut das Gift nichts an; Das Böse schadet nicht dem, der es nicht getan."',
                'created_at' => '2017-09-06 10:57:57',
                'updated_at' => '2017-09-06 10:57:57',
            ),
            144 => 
            array (
                'id' => 145,
                'user_id' => 187,
                'photo_id' => 153,
                'body' => 'Thomas Edison hätte dazu gesagt: "Kummer verdaut man am besten, wenn man ihn in Wein auflöst."',
                'created_at' => '2017-09-04 23:10:49',
                'updated_at' => '2017-09-04 23:10:49',
            ),
            145 => 
            array (
                'id' => 146,
                'user_id' => 111,
                'photo_id' => 316,
                'body' => 'Rosa Parks hätte dazu gesagt: "Die Kunst der Weisheit besteht darin, zu wissen, was man übersehen muß."',
                'created_at' => '2017-08-27 14:07:15',
                'updated_at' => '2017-08-27 14:07:15',
            ),
            146 => 
            array (
                'id' => 147,
                'user_id' => 104,
                'photo_id' => 74,
                'body' => 'Aung San Suu Kyi hätte dazu gesagt: "Grenzen der Technik: Ein Tauchsieder kocht auch nur mit Wasser."',
                'created_at' => '2017-09-17 06:54:57',
                'updated_at' => '2017-09-17 06:54:57',
            ),
            147 => 
            array (
                'id' => 148,
                'user_id' => 113,
                'photo_id' => 445,
                'body' => 'Lyndon Johnson hätte dazu gesagt: "Ein Haus wird gebaut, aber ein Zuhause wird geformt."',
                'created_at' => '2017-09-15 11:51:22',
                'updated_at' => '2017-09-15 11:51:22',
            ),
            148 => 
            array (
                'id' => 149,
                'user_id' => 15,
                'photo_id' => 347,
                'body' => 'Ludwig Beethoven hätte dazu gesagt: "Bemerke, höre, schweige. Urteile wenig, frage viel."',
                'created_at' => '2017-09-12 13:31:31',
                'updated_at' => '2017-09-12 13:31:31',
            ),
            149 => 
            array (
                'id' => 150,
                'user_id' => 78,
                'photo_id' => 355,
                'body' => 'Oprah Winfrey hätte dazu gesagt: "Es ist eine viel schlimmere Art des Stolzes, andere zu verkleinern, als sich selbst zu erheben."',
                'created_at' => '2017-09-09 19:29:36',
                'updated_at' => '2017-09-09 19:29:36',
            ),
            150 => 
            array (
                'id' => 151,
                'user_id' => 33,
                'photo_id' => 185,
                'body' => 'Indira Gandhi hätte dazu gesagt: "In den Bau der Welt taugt nur der abgeschliffene Stein."',
                'created_at' => '2017-09-13 16:06:26',
                'updated_at' => '2017-09-13 16:06:26',
            ),
            151 => 
            array (
                'id' => 152,
                'user_id' => 123,
                'photo_id' => 700,
                'body' => 'Eva Peron hätte dazu gesagt: "Doch schmecken muß man alles, heiß und kalt, wer jung kein Narr war, wird es, wenn er alt."',
                'created_at' => '2017-09-07 04:09:00',
                'updated_at' => '2017-09-07 04:09:00',
            ),
            152 => 
            array (
                'id' => 153,
                'user_id' => 56,
                'photo_id' => 300,
                'body' => 'Benazir Bhutto hätte dazu gesagt: "Gott ist der schweigende Partner bei allen großen Unternehmungen."',
                'created_at' => '2017-09-16 06:50:03',
                'updated_at' => '2017-09-16 06:50:03',
            ),
            153 => 
            array (
                'id' => 154,
                'user_id' => 74,
                'photo_id' => 648,
                'body' => 'Desmond Tutu hätte dazu gesagt: "Es wäre dumm, sich über die Außenwelt zu ärgern. Sie kümmert sich nicht darum."',
                'created_at' => '2017-09-11 22:48:03',
                'updated_at' => '2017-09-11 22:48:03',
            ),
            154 => 
            array (
                'id' => 155,
                'user_id' => 38,
                'photo_id' => 586,
                'body' => 'Dalai Lama hätte dazu gesagt: "Mit jedem Tag des Älterwerdens, befürchte ich genauso zu werden wie alle Menschen."',
                'created_at' => '2017-09-12 21:18:37',
                'updated_at' => '2017-09-12 21:18:37',
            ),
            155 => 
            array (
                'id' => 156,
                'user_id' => 71,
                'photo_id' => 181,
                'body' => 'Walt Disney hätte dazu gesagt: "Alkohol macht nicht nur viele Menschen unverträglich, er reduziert zum Glück auch die Anzahl der Unverträglichen."',
                'created_at' => '2017-09-17 18:47:37',
                'updated_at' => '2017-09-17 18:47:37',
            ),
            156 => 
            array (
                'id' => 157,
                'user_id' => 147,
                'photo_id' => 337,
                'body' => 'Peter Sellers hätte dazu gesagt: "Ich will den Namen Gottes loben mit einem Lied."',
                'created_at' => '2017-09-06 01:40:39',
                'updated_at' => '2017-09-06 01:40:39',
            ),
            157 => 
            array (
                'id' => 158,
                'user_id' => 38,
                'photo_id' => 545,
                'body' => 'Barack Obama hätte dazu gesagt: "Im Kriege verlieren alle, auch die Sieger."',
                'created_at' => '2017-09-04 00:11:34',
                'updated_at' => '2017-09-04 00:11:34',
            ),
            158 => 
            array (
                'id' => 159,
                'user_id' => 100,
                'photo_id' => 124,
                'body' => 'Malcolm X hätte dazu gesagt: "Zum Empfangen und Geben ist der Mensch geschaffen, zu Wirksamkeit und Freude, zum Tun und zum Leiden."',
                'created_at' => '2017-09-23 17:49:23',
                'updated_at' => '2017-09-23 17:49:23',
            ),
            159 => 
            array (
                'id' => 160,
                'user_id' => 99,
                'photo_id' => 507,
                'body' => 'J.K.Rowling hätte dazu gesagt: "Die Zeit ist ein großer Lehrer. Das Unglück: Sie tötet ihre Schüler."',
                'created_at' => '2017-08-31 21:36:54',
                'updated_at' => '2017-08-31 21:36:54',
            ),
            160 => 
            array (
                'id' => 161,
                'user_id' => 35,
                'photo_id' => 48,
                'body' => 'Richard Branson hätte dazu gesagt: "Vergangenes Leid muß Wohlsein fühlen lehren. Wer nie gedarbt, ist ohne Freude reich."',
                'created_at' => '2017-09-11 14:00:38',
                'updated_at' => '2017-09-11 14:00:38',
            ),
            161 => 
            array (
                'id' => 162,
                'user_id' => 92,
                'photo_id' => 574,
                'body' => 'Pele hätte dazu gesagt: "Die Natur ist ein Verschwender, der keine Kosten und Mühen scheut, um sein Werk in kürzester Zeit zu vollenden."',
                'created_at' => '2017-09-23 14:07:07',
                'updated_at' => '2017-09-23 14:07:07',
            ),
            162 => 
            array (
                'id' => 163,
                'user_id' => 68,
                'photo_id' => 346,
                'body' => 'Angelina Jolie hätte dazu gesagt: "Gilt es zu hören, sei der Erste. Sei der Letzte, wenn es zu reden gilt."',
                'created_at' => '2017-08-29 02:30:25',
                'updated_at' => '2017-08-29 02:30:25',
            ),
            163 => 
            array (
                'id' => 164,
                'user_id' => 189,
                'photo_id' => 202,
                'body' => 'Jesse Owens hätte dazu gesagt: "Der innere Friede hängt immer vom Menschen selbst ab: Der Mensch braucht zu seinem Glück im wahren Verstande nichts als ihn, und braucht, um ihn zu besitzen, nichts als sich."',
                'created_at' => '2017-09-01 12:45:24',
                'updated_at' => '2017-09-01 12:45:24',
            ),
            164 => 
            array (
                'id' => 165,
                'user_id' => 25,
                'photo_id' => 116,
                'body' => 'Ernest Hemingway hätte dazu gesagt: "Man kann nicht dem Arbeitnehmer helfen, indem man den Arbeitgeber beseitigt."',
                'created_at' => '2017-09-16 03:50:35',
                'updated_at' => '2017-09-16 03:50:35',
            ),
            165 => 
            array (
                'id' => 166,
                'user_id' => 155,
                'photo_id' => 636,
                'body' => 'John Lennon hätte dazu gesagt: "Wußten Sie schon, daß gerade ältere Herren junges Gemüse besonders schätzen?"',
                'created_at' => '2017-08-30 23:15:21',
                'updated_at' => '2017-08-30 23:15:21',
            ),
            166 => 
            array (
                'id' => 167,
                'user_id' => 162,
                'photo_id' => 55,
                'body' => 'Henry Ford hätte dazu gesagt: "Jesus sagte: Steh auf, nimm deine Bahre und geh! Sofort wurde der Mann gesund, nahm seine Bahre und ging."',
                'created_at' => '2017-09-06 01:03:32',
                'updated_at' => '2017-09-06 01:03:32',
            ),
            167 => 
            array (
                'id' => 168,
                'user_id' => 162,
                'photo_id' => 450,
                'body' => 'Haile Selassie hätte dazu gesagt: "Das Gefallen am Schönen und die Macht der Liebe sind etwas Natürliches, weder befohlen noch verboten, denn die Herzen stehen in Gottes Hand, und er wendet sie."',
                'created_at' => '2017-09-17 03:22:08',
                'updated_at' => '2017-09-17 03:22:08',
            ),
            168 => 
            array (
                'id' => 169,
                'user_id' => 27,
                'photo_id' => 257,
                'body' => 'Joseph Stalin hätte dazu gesagt: "Gut ist eine lange Wurst und eine kurze Predigt."',
                'created_at' => '2017-09-16 21:55:43',
                'updated_at' => '2017-09-16 21:55:43',
            ),
            169 => 
            array (
                'id' => 170,
                'user_id' => 110,
                'photo_id' => 13,
                'body' => 'Lord Baden Powell hätte dazu gesagt: "Wir sind nicht, wofür wir uns oft halten, doch wir sind viel mehr, als die meisten von uns ahnen."',
                'created_at' => '2017-09-14 19:47:19',
                'updated_at' => '2017-09-14 19:47:19',
            ),
            170 => 
            array (
                'id' => 171,
                'user_id' => 65,
                'photo_id' => 171,
                'body' => 'Michael Jordon hätte dazu gesagt: "Mäßige deinen Zorn; es fallen die Funken erst auf dich; auf den Feind, wenn sie je treffen, zuletzt."',
                'created_at' => '2017-09-01 16:37:35',
                'updated_at' => '2017-09-01 16:37:35',
            ),
            171 => 
            array (
                'id' => 172,
                'user_id' => 9,
                'photo_id' => 536,
                'body' => 'V.Lenin hätte dazu gesagt: "Unter Umständen ist es für manches Kind am besten, wenn es gar nicht erzogen wird."',
                'created_at' => '2017-09-19 10:15:59',
                'updated_at' => '2017-09-19 10:15:59',
            ),
            172 => 
            array (
                'id' => 173,
                'user_id' => 128,
                'photo_id' => 295,
                'body' => 'Ingrid Bergman hätte dazu gesagt: "Nirgends zeigt sich der Mensch empfindlicher als in seinem Egoismus, und durch nichts ist er leichter zu besiegen als durch ihn."',
                'created_at' => '2017-08-25 23:18:53',
                'updated_at' => '2017-08-25 23:18:53',
            ),
            173 => 
            array (
                'id' => 174,
                'user_id' => 30,
                'photo_id' => 615,
                'body' => 'Fidel Castro hätte dazu gesagt: "Ein guter Nachbar ist besser als viele böse Verwandten."',
                'created_at' => '2017-09-22 20:06:40',
                'updated_at' => '2017-09-22 20:06:40',
            ),
            174 => 
            array (
                'id' => 175,
                'user_id' => 126,
                'photo_id' => 199,
                'body' => 'Oscar Wilde hätte dazu gesagt: "Es regnet auf alle Dächer."',
                'created_at' => '2017-08-31 14:03:15',
                'updated_at' => '2017-08-31 14:03:15',
            ),
            175 => 
            array (
                'id' => 176,
                'user_id' => 88,
                'photo_id' => 306,
                'body' => 'Coco Chanel hätte dazu gesagt: "Was man heute politische Ansichten nennt, ist meist nur der Ausdruck wirtschaftlicher und sozialer Interessen."',
                'created_at' => '2017-09-21 08:31:39',
                'updated_at' => '2017-09-21 08:31:39',
            ),
            176 => 
            array (
                'id' => 177,
                'user_id' => 180,
                'photo_id' => 694,
                'body' => 'Pope Francis hätte dazu gesagt: "Und dann war da noch die Frustrierte, die sagte: "Ich habe nie bekommen, was ich wollte. Ich wollte, ich hätte das bekommen, was ich wollte. Aber nicht einmal das will ich."',
                'created_at' => '2017-09-22 13:19:55',
                'updated_at' => '2017-09-22 13:19:55',
            ),
            177 => 
            array (
                'id' => 178,
                'user_id' => 84,
                'photo_id' => 68,
                'body' => 'Amelia Earhart hätte dazu gesagt: "In dem ehelichen Leben soll das vereinigte Paar gleichsam eine einzige moralische Person ausmachen, welche durch den Verstand des Mannes und den Geschmack der Frauen belebt und regiert wird."',
                'created_at' => '2017-09-19 13:04:57',
                'updated_at' => '2017-09-19 13:04:57',
            ),
            178 => 
            array (
                'id' => 179,
                'user_id' => 54,
                'photo_id' => 637,
                'body' => 'Adolf Hitler hätte dazu gesagt: "Nichts ist schwerer zu ertragen als Reißverschluß auf vollen Magen."',
                'created_at' => '2017-09-10 14:01:07',
                'updated_at' => '2017-09-10 14:01:07',
            ),
            179 => 
            array (
                'id' => 180,
                'user_id' => 85,
                'photo_id' => 39,
                'body' => 'Sting hätte dazu gesagt: "Das Gewissen ist der Puls der Vernunft."',
                'created_at' => '2017-09-19 18:39:33',
                'updated_at' => '2017-09-19 18:39:33',
            ),
            180 => 
            array (
                'id' => 181,
                'user_id' => 175,
                'photo_id' => 325,
                'body' => 'Mary Magdalene hätte dazu gesagt: "Wer mit dem Kopf durch die Wand will, holt sich nur Beulen."',
                'created_at' => '2017-09-11 21:51:43',
                'updated_at' => '2017-09-11 21:51:43',
            ),
            181 => 
            array (
                'id' => 182,
                'user_id' => 28,
                'photo_id' => 692,
                'body' => 'Alfred Hitchcock hätte dazu gesagt: "Nur ein Tor zertrümmert den Spiegel, wenn ihm das Spiegelbild mißfällt."',
                'created_at' => '2017-09-04 01:31:16',
                'updated_at' => '2017-09-04 01:31:16',
            ),
            182 => 
            array (
                'id' => 183,
                'user_id' => 151,
                'photo_id' => 178,
                'body' => 'Michael Jackson hätte dazu gesagt: "Faulheit, Frauendienst, Kränklichkeit, zu große Anhänglichkeit an den Geburtsort, Genügsamkeit und Furchtsamkeit, diese sind sechs Hindernisse der Größe."',
                'created_at' => '2017-09-16 22:35:14',
                'updated_at' => '2017-09-16 22:35:14',
            ),
            183 => 
            array (
                'id' => 184,
                'user_id' => 79,
                'photo_id' => 444,
                'body' => 'Madonna hätte dazu gesagt: "Laß euch nicht mit falschen Göttern ein!"',
                'created_at' => '2017-08-25 08:18:09',
                'updated_at' => '2017-08-25 08:18:09',
            ),
            184 => 
            array (
                'id' => 185,
                'user_id' => 85,
                'photo_id' => 656,
                'body' => 'Mata Hari hätte dazu gesagt: "Wer sich entschieden hat, etwas zu tun, und an nichts anderes denkt, überwindet alle Hindernisse."',
                'created_at' => '2017-09-14 23:09:32',
                'updated_at' => '2017-09-14 23:09:32',
            ),
            185 => 
            array (
                'id' => 186,
                'user_id' => 62,
                'photo_id' => 361,
                'body' => 'Cleopatra hätte dazu gesagt: "Würden die Pforten der Wahrnehmung gereinigt, erschiene den Menschen alles, wie es ist: unendlich."',
                'created_at' => '2017-09-09 12:52:02',
                'updated_at' => '2017-09-09 12:52:02',
            ),
            186 => 
            array (
                'id' => 187,
                'user_id' => 45,
                'photo_id' => 571,
                'body' => 'Grace Kelly hätte dazu gesagt: "Es gibt nicht nur einen bunten Hund in der Welt."',
                'created_at' => '2017-09-17 19:50:54',
                'updated_at' => '2017-09-17 19:50:54',
            ),
            187 => 
            array (
                'id' => 188,
                'user_id' => 112,
                'photo_id' => 412,
                'body' => 'Steve Jobs hätte dazu gesagt: "Als Sklaven und Herren ihrer Eigenliebe leben die Menschen dahin, nicht um zu leben, sondern um andere glauben zu machen, sie hätten gelebt."',
                'created_at' => '2017-09-04 04:50:51',
                'updated_at' => '2017-09-04 04:50:51',
            ),
            188 => 
            array (
                'id' => 189,
                'user_id' => 55,
                'photo_id' => 177,
                'body' => 'Ronald Reagan hätte dazu gesagt: "Du lebst nicht für dich allein auf Erden."',
                'created_at' => '2017-09-12 13:57:41',
                'updated_at' => '2017-09-12 13:57:41',
            ),
            189 => 
            array (
                'id' => 190,
                'user_id' => 163,
                'photo_id' => 517,
                'body' => 'Lionel Messi hätte dazu gesagt: "Was ist der Mensch, daß du seiner gedenkst?"',
                'created_at' => '2017-09-24 11:22:47',
                'updated_at' => '2017-09-24 11:22:47',
            ),
            190 => 
            array (
                'id' => 191,
                'user_id' => 102,
                'photo_id' => 85,
                'body' => 'Babe Ruth hätte dazu gesagt: "Solange die Menschen sterben können und das Leben lieben, wird der Arzt verspottet und gut bezahlt werden."',
                'created_at' => '2017-09-20 06:53:28',
                'updated_at' => '2017-09-20 06:53:28',
            ),
            191 => 
            array (
                'id' => 192,
                'user_id' => 56,
                'photo_id' => 671,
                'body' => 'Bob Geldof hätte dazu gesagt: "Gastsein ist gut. Heimkommen ist besser."',
                'created_at' => '2017-08-27 20:33:54',
                'updated_at' => '2017-08-27 20:33:54',
            ),
            192 => 
            array (
                'id' => 193,
                'user_id' => 178,
                'photo_id' => 127,
                'body' => 'Roger Federer hätte dazu gesagt: "Wer die Vergangenheit preist, tadelt die Gegenwart."',
                'created_at' => '2017-09-14 13:01:06',
                'updated_at' => '2017-09-14 13:01:06',
            ),
            193 => 
            array (
                'id' => 194,
                'user_id' => 46,
                'photo_id' => 389,
                'body' => 'Sigmund Freud hätte dazu gesagt: "Beten heißt, liebend an Jesus denken."',
                'created_at' => '2017-09-02 11:19:23',
                'updated_at' => '2017-09-02 11:19:23',
            ),
            194 => 
            array (
                'id' => 195,
                'user_id' => 53,
                'photo_id' => 280,
                'body' => 'Woodrow Wilson hätte dazu gesagt: "Ich bin nicht entmutigt, weil jeder als falsch verworfene Versuch ein weiterer Schritt vorwärts ist."',
                'created_at' => '2017-09-08 05:31:03',
                'updated_at' => '2017-09-08 05:31:03',
            ),
            195 => 
            array (
                'id' => 196,
                'user_id' => 161,
                'photo_id' => 244,
                'body' => 'Mao Zedong hätte dazu gesagt: "Doppelt lebt, wer auch Vergangenes genießt."',
                'created_at' => '2017-09-10 10:45:14',
                'updated_at' => '2017-09-10 10:45:14',
            ),
            196 => 
            array (
                'id' => 197,
                'user_id' => 83,
                'photo_id' => 199,
                'body' => 'Katherine Hepburn hätte dazu gesagt: "Der Busch hat Augen, der Baumstumpf trägt einen Hut."',
                'created_at' => '2017-09-15 09:18:16',
                'updated_at' => '2017-09-15 09:18:16',
            ),
            197 => 
            array (
                'id' => 198,
                'user_id' => 165,
                'photo_id' => 412,
                'body' => 'Audrey Hepburn hätte dazu gesagt: "Die Nacht ist die Mutter von Gedanken."',
                'created_at' => '2017-09-15 00:30:23',
                'updated_at' => '2017-09-15 00:30:23',
            ),
            198 => 
            array (
                'id' => 199,
                'user_id' => 172,
                'photo_id' => 298,
                'body' => 'David Beckham hätte dazu gesagt: "Das Leben ist eine große Gelegenheit, und es ist sehr schade, wenn der Mensch das erst zu spät erkennt."',
                'created_at' => '2017-09-23 20:40:56',
                'updated_at' => '2017-09-23 20:40:56',
            ),
            199 => 
            array (
                'id' => 200,
                'user_id' => 193,
                'photo_id' => 474,
                'body' => 'Usain Bolt hätte dazu gesagt: "Herr, ich rufe zu dir. Eile mir zur Hilfe; höre auf meine Stimme, wenn ich zu dir rufe."',
                'created_at' => '2017-09-14 12:31:57',
                'updated_at' => '2017-09-14 12:31:57',
            ),
            200 => 
            array (
                'id' => 201,
                'user_id' => 11,
                'photo_id' => 569,
                'body' => 'Carl Lewis hätte dazu gesagt: "Seit zehn Jahren versuchen viele Ostdeutsche möglichst schnell Wessis zu werden. Natürlich ohne ihre Identität dabei aufzugeben. Hundertprozentig ist das jedoch nur ganz wenigen gelungen. Aber immerhin gibt es inzwischen im ',
                'created_at' => '2017-09-06 19:06:27',
                'updated_at' => '2017-09-06 19:06:27',
            ),
            201 => 
            array (
                'id' => 202,
                'user_id' => 121,
                'photo_id' => 491,
                'body' => 'Prince Charles hätte dazu gesagt: "Verlaßt euch nicht auf Gewalt!"',
                'created_at' => '2017-09-02 22:52:08',
                'updated_at' => '2017-09-02 22:52:08',
            ),
            202 => 
            array (
                'id' => 203,
                'user_id' => 50,
                'photo_id' => 283,
                'body' => 'Jacqueline Kennedy Onassis hätte dazu gesagt: "Ermuntert einander mit Psalmen und Lobgesängen und geistlichen Liedern, singt und spielt dem Herrn in euren Herzen."',
                'created_at' => '2017-08-27 15:46:30',
                'updated_at' => '2017-08-27 15:46:30',
            ),
            203 => 
            array (
                'id' => 204,
                'user_id' => 75,
                'photo_id' => 546,
                'body' => 'C.S. Lewis hätte dazu gesagt: "Das einzige Mittel, den Irrtum zu vermeiden, ist die Unwissenheit."',
                'created_at' => '2017-09-12 06:10:18',
                'updated_at' => '2017-09-12 06:10:18',
            ),
            204 => 
            array (
                'id' => 205,
                'user_id' => 100,
                'photo_id' => 251,
                'body' => 'Billie Holiday hätte dazu gesagt: "Willst du fremde Fehler zählen, heb an deinen an zu zählen. Ist mir recht, wird dir die Weile zu den fremden Fehlern fehlen."',
                'created_at' => '2017-09-07 11:15:27',
                'updated_at' => '2017-09-07 11:15:27',
            ),
            205 => 
            array (
                'id' => 206,
                'user_id' => 165,
                'photo_id' => 30,
                'body' => 'J.R.R. Tolkien hätte dazu gesagt: "Trau niemals einem Menschen, der sich die Haare färbt. Er färbt auch seine Gefühle."',
                'created_at' => '2017-09-18 12:59:45',
                'updated_at' => '2017-09-18 12:59:45',
            ),
            206 => 
            array (
                'id' => 207,
                'user_id' => 44,
                'photo_id' => 594,
                'body' => 'Billie Jean King hätte dazu gesagt: "Treibt uns der Ehrgeiz zur Einsamkeit? Die Antwort muß lauten: Ja! Denn was ist ihm mehr zuwider als Gemeinsamkeit? Was ist ihm wichtiger als Bewegungsfreiheit?"',
                'created_at' => '2017-09-21 17:48:54',
                'updated_at' => '2017-09-21 17:48:54',
            ),
            207 => 
            array (
                'id' => 208,
                'user_id' => 37,
                'photo_id' => 576,
                'body' => 'Anne Frank hätte dazu gesagt: "Was ein Leben an Länge gewinnt, verliert es meist an Tiefe."',
                'created_at' => '2017-09-09 03:53:10',
                'updated_at' => '2017-09-09 03:53:10',
            ),
            208 => 
            array (
                'id' => 209,
                'user_id' => 122,
                'photo_id' => 447,
                'body' => 'Simon Bolivar hätte dazu gesagt: "Die Vergangenheit und die Erinnerung haben eine unendliche Kraft, und wenn auch schmerzliche Sehnsucht daraus quillt, sich ihnen hinzugeben, so liegt darin doch ein unaussprechlich süßer Genuß."',
                'created_at' => '2017-09-09 14:02:08',
                'updated_at' => '2017-09-09 14:02:08',
            ),
            209 => 
            array (
                'id' => 210,
                'user_id' => 90,
                'photo_id' => 5,
                'body' => 'Marie Antoinette hätte dazu gesagt: "Im Wald lehnt sich Baum an Baum, also warum nicht Mensch an Mensch?"',
                'created_at' => '2017-09-12 19:45:34',
                'updated_at' => '2017-09-12 19:45:34',
            ),
            210 => 
            array (
                'id' => 211,
                'user_id' => 31,
                'photo_id' => 696,
                'body' => 'Christiano Ronaldo hätte dazu gesagt: "Nur der, der gar nichts tut, macht einen Fehler."',
                'created_at' => '2017-09-07 05:40:09',
                'updated_at' => '2017-09-07 05:40:09',
            ),
            211 => 
            array (
                'id' => 212,
                'user_id' => 127,
                'photo_id' => 116,
                'body' => 'Emmeline Pankhurst hätte dazu gesagt: "Wer sich getroffen fühlt, ist gemeint."',
                'created_at' => '2017-09-09 14:09:12',
                'updated_at' => '2017-09-09 14:09:12',
            ),
            212 => 
            array (
                'id' => 213,
                'user_id' => 7,
                'photo_id' => 149,
                'body' => 'Emile Zatopek hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-07 04:04:34',
                'updated_at' => '2017-09-07 04:04:34',
            ),
            213 => 
            array (
                'id' => 214,
                'user_id' => 88,
                'photo_id' => 392,
                'body' => 'Lech Walesa hätte dazu gesagt: "Bin, der mich sagen hört, »umsonst« – heißt »gratis«, doch auch »vergeblich« –, Gnade wie Nichtigkeit gleichermaßen."',
                'created_at' => '2017-09-13 06:23:18',
                'updated_at' => '2017-09-13 06:23:18',
            ),
            214 => 
            array (
                'id' => 215,
                'user_id' => 148,
                'photo_id' => 529,
                'body' => 'Marilyn Monroe hätte dazu gesagt: "Sein Leid in sich fressen."',
                'created_at' => '2017-09-03 18:51:02',
                'updated_at' => '2017-09-03 18:51:02',
            ),
            215 => 
            array (
                'id' => 216,
                'user_id' => 84,
                'photo_id' => 682,
                'body' => 'Abraham Lincoln hätte dazu gesagt: "Solang ein Weib liebt, liebt es in einem fort – ein Mann hat dazwischen zu tun."',
                'created_at' => '2017-09-05 22:19:53',
                'updated_at' => '2017-09-05 22:19:53',
            ),
            216 => 
            array (
                'id' => 217,
                'user_id' => 146,
                'photo_id' => 340,
                'body' => 'Mother Teresa hätte dazu gesagt: "Mit Fristgeben gedeiht der Handel."',
                'created_at' => '2017-09-21 17:27:14',
                'updated_at' => '2017-09-21 17:27:14',
            ),
            217 => 
            array (
                'id' => 218,
                'user_id' => 146,
                'photo_id' => 503,
                'body' => 'John F. Kennedy hätte dazu gesagt: "Flausen im Kopf sorgen für die Federung des Denkapparates."',
                'created_at' => '2017-08-27 00:44:18',
                'updated_at' => '2017-08-27 00:44:18',
            ),
            218 => 
            array (
                'id' => 219,
                'user_id' => 137,
                'photo_id' => 380,
                'body' => 'Martin Luther King hätte dazu gesagt: "Wer sich nicht schämt, etwas nicht zu können, und sich nicht ärgert, etwas nicht zu können, der kommt voran."',
                'created_at' => '2017-09-14 08:59:10',
                'updated_at' => '2017-09-14 08:59:10',
            ),
            219 => 
            array (
                'id' => 220,
                'user_id' => 67,
                'photo_id' => 328,
                'body' => 'Nelson Mandela hätte dazu gesagt: "Werden die Eisheiligen im Hundertjährigen Eskimo-Kalender als heiße Jungs aufgeführt?"',
                'created_at' => '2017-09-08 06:51:03',
                'updated_at' => '2017-09-08 06:51:03',
            ),
            220 => 
            array (
                'id' => 221,
                'user_id' => 23,
                'photo_id' => 647,
                'body' => 'Winston Churchill hätte dazu gesagt: "Viele verabschieden sich von dieser Welt, ohne jemals etwas gesagt zu haben."',
                'created_at' => '2017-08-29 13:53:54',
                'updated_at' => '2017-08-29 13:53:54',
            ),
            221 => 
            array (
                'id' => 222,
                'user_id' => 56,
                'photo_id' => 167,
                'body' => 'Bill Gates hätte dazu gesagt: "Es ist weise, das Glück wahrzunehmen, das unser Herrgott einem zuschickt."',
                'created_at' => '2017-09-08 05:48:54',
                'updated_at' => '2017-09-08 05:48:54',
            ),
            222 => 
            array (
                'id' => 223,
                'user_id' => 115,
                'photo_id' => 677,
                'body' => 'Muhammad Ali hätte dazu gesagt: "Rache ist teuer."',
                'created_at' => '2017-09-23 07:11:07',
                'updated_at' => '2017-09-23 07:11:07',
            ),
            223 => 
            array (
                'id' => 224,
                'user_id' => 17,
                'photo_id' => 203,
                'body' => 'Mahatma Gandhi hätte dazu gesagt: "Die Macht ist bei den Fröhlichen."',
                'created_at' => '2017-09-04 01:31:17',
                'updated_at' => '2017-09-04 01:31:17',
            ),
            224 => 
            array (
                'id' => 225,
                'user_id' => 64,
                'photo_id' => 11,
                'body' => 'Margaret Thatcher hätte dazu gesagt: "Wenn du ein Geheimnis nicht bewahren willst, dann sag es einer Frau."',
                'created_at' => '2017-09-16 22:35:15',
                'updated_at' => '2017-09-16 22:35:15',
            ),
            225 => 
            array (
                'id' => 226,
                'user_id' => 141,
                'photo_id' => 688,
                'body' => 'Charles de Gaulle hätte dazu gesagt: "Wenn man nichts hat, was man liebt, muß man lieben, was man hat."',
                'created_at' => '2017-08-25 08:18:10',
                'updated_at' => '2017-08-25 08:18:10',
            ),
            226 => 
            array (
                'id' => 227,
                'user_id' => 144,
                'photo_id' => 189,
                'body' => 'Christopher Columbus hätte dazu gesagt: "Ein guter Anfang ist ein halber Erfolg."',
                'created_at' => '2017-09-14 23:09:33',
                'updated_at' => '2017-09-14 23:09:33',
            ),
            227 => 
            array (
                'id' => 228,
                'user_id' => 130,
                'photo_id' => 590,
                'body' => 'George Orwell hätte dazu gesagt: "Popularität hat für mich immer etwas Unbehagliches."',
                'created_at' => '2017-09-09 12:52:03',
                'updated_at' => '2017-09-09 12:52:03',
            ),
            228 => 
            array (
                'id' => 229,
                'user_id' => 51,
                'photo_id' => 84,
                'body' => 'Charles Darwin hätte dazu gesagt: "Die Ehre ist die Poesie der Pflicht!"',
                'created_at' => '2017-09-17 19:50:55',
                'updated_at' => '2017-09-17 19:50:55',
            ),
            229 => 
            array (
                'id' => 230,
                'user_id' => 98,
                'photo_id' => 589,
                'body' => 'Elvis Presley hätte dazu gesagt: "Ein Mensch ohne Geld ist wie ein Wolf ohne Zähne."',
                'created_at' => '2017-09-04 04:50:52',
                'updated_at' => '2017-09-04 04:50:52',
            ),
            230 => 
            array (
                'id' => 231,
                'user_id' => 124,
                'photo_id' => 182,
                'body' => 'Albert Einstein hätte dazu gesagt: "Es ist irrelevant, wie lange sich die Dummköpfe unter dem Baum der Weisheit und Barmherzigkeit aufhalten. Für sie wird kein einziger Apfel herunter fallen."',
                'created_at' => '2017-09-12 13:57:42',
                'updated_at' => '2017-09-12 13:57:42',
            ),
            231 => 
            array (
                'id' => 232,
                'user_id' => 135,
                'photo_id' => 34,
                'body' => 'Paul McCartney hätte dazu gesagt: "Christus und Moses, alle Seher und Magier waren "in der Ruhe". Martha arbeitete sich ab - Maria baute sich auf. Darum sagte Christus von Maria, sie habe das bessere Teil erwählt, da sie sich nicht zur Hausmagd erniedrigt',
                'created_at' => '2017-09-24 11:22:48',
                'updated_at' => '2017-09-24 11:22:48',
            ),
            232 => 
            array (
                'id' => 233,
                'user_id' => 177,
                'photo_id' => 23,
                'body' => 'Plato hätte dazu gesagt: "Wo du zu tadeln hast, komm und hilf!"',
                'created_at' => '2017-09-20 06:53:29',
                'updated_at' => '2017-09-20 06:53:29',
            ),
            233 => 
            array (
                'id' => 234,
                'user_id' => 29,
                'photo_id' => 81,
                'body' => 'Queen Elizabeth hätte dazu gesagt: "Lebendig ist das Wort Gottes, kraftvoll und schärfer als jedes zweischneidige Schwert."',
                'created_at' => '2017-08-27 20:33:55',
                'updated_at' => '2017-08-27 20:33:55',
            ),
            234 => 
            array (
                'id' => 235,
                'user_id' => 167,
                'photo_id' => 198,
                'body' => 'Queen Victoria hätte dazu gesagt: "Wer niemals außer sich gerät, wird niemals in sich gehen."',
                'created_at' => '2017-09-14 13:01:07',
                'updated_at' => '2017-09-14 13:01:07',
            ),
            235 => 
            array (
                'id' => 236,
                'user_id' => 101,
                'photo_id' => 681,
                'body' => 'John M Keynes hätte dazu gesagt: "Wer nicht läuft, gelangt nie ans Ziel!"',
                'created_at' => '2017-09-02 11:19:24',
                'updated_at' => '2017-09-02 11:19:24',
            ),
            236 => 
            array (
                'id' => 237,
                'user_id' => 163,
                'photo_id' => 223,
                'body' => 'Mikhail Gorbachev hätte dazu gesagt: "Machen Sie es sich zur Aufgabe, höheren Ansprüchen zu genügen, als andere an Sie stellen."',
                'created_at' => '2017-09-08 05:31:04',
                'updated_at' => '2017-09-08 05:31:04',
            ),
            237 => 
            array (
                'id' => 238,
                'user_id' => 187,
                'photo_id' => 36,
                'body' => 'Jawaharlal Nehru hätte dazu gesagt: "Laß die anderen in Ruhe, sorge für dich selbst."',
                'created_at' => '2017-09-10 10:45:15',
                'updated_at' => '2017-09-10 10:45:15',
            ),
            238 => 
            array (
                'id' => 239,
                'user_id' => 110,
                'photo_id' => 112,
                'body' => 'Leonardo da Vinci hätte dazu gesagt: "Ich bin so aufgeregt."',
                'created_at' => '2017-09-15 09:18:17',
                'updated_at' => '2017-09-15 09:18:17',
            ),
            239 => 
            array (
                'id' => 240,
                'user_id' => 2,
                'photo_id' => 15,
                'body' => 'Louis Pasteur hätte dazu gesagt: "Wo will man aber Weisheit finden, und wo ist die Stätte der Einsicht?"',
                'created_at' => '2017-09-15 00:30:24',
                'updated_at' => '2017-09-15 00:30:24',
            ),
            240 => 
            array (
                'id' => 241,
                'user_id' => 101,
                'photo_id' => 433,
                'body' => 'Leo Tolstoy hätte dazu gesagt: "Bevor du sprichst, denke siebenmal darüber nach!"',
                'created_at' => '2017-09-23 20:40:57',
                'updated_at' => '2017-09-23 20:40:57',
            ),
            241 => 
            array (
                'id' => 242,
                'user_id' => 50,
                'photo_id' => 180,
                'body' => 'Pablo Picasso hätte dazu gesagt: "Nichts ist einem Menschen willkommener als ein Freund zur rechten Zeit."',
                'created_at' => '2017-09-14 12:31:58',
                'updated_at' => '2017-09-14 12:31:58',
            ),
            242 => 
            array (
                'id' => 243,
                'user_id' => 120,
                'photo_id' => 232,
                'body' => 'Vincent Van Gogh hätte dazu gesagt: "Das Alter ist eine Reisende der Nacht. die Erde verbirgt sich und der Himmel wird sichtbar."',
                'created_at' => '2017-09-06 19:06:28',
                'updated_at' => '2017-09-06 19:06:28',
            ),
            243 => 
            array (
                'id' => 244,
                'user_id' => 35,
                'photo_id' => 216,
                'body' => 'Franklin D. Roosevelt hätte dazu gesagt: "Wer den anderen liebt, hat das Gesetz erfüllt."',
                'created_at' => '2017-09-02 22:52:09',
                'updated_at' => '2017-09-02 22:52:09',
            ),
            244 => 
            array (
                'id' => 245,
                'user_id' => 136,
                'photo_id' => 222,
                'body' => 'Pope John Paul II hätte dazu gesagt: "Offene Hände schenken mehr als saubere Finger."',
                'created_at' => '2017-08-27 15:46:31',
                'updated_at' => '2017-08-27 15:46:31',
            ),
            245 => 
            array (
                'id' => 246,
                'user_id' => 102,
                'photo_id' => 334,
                'body' => 'Thomas Edison hätte dazu gesagt: "Wer heile Hände hat, dem tut das Gift nichts an; Das Böse schadet nicht dem, der es nicht getan."',
                'created_at' => '2017-09-12 06:10:19',
                'updated_at' => '2017-09-12 06:10:19',
            ),
            246 => 
            array (
                'id' => 247,
                'user_id' => 172,
                'photo_id' => 272,
                'body' => 'Rosa Parks hätte dazu gesagt: "Kummer verdaut man am besten, wenn man ihn in Wein auflöst."',
                'created_at' => '2017-09-07 11:15:28',
                'updated_at' => '2017-09-07 11:15:28',
            ),
            247 => 
            array (
                'id' => 248,
                'user_id' => 167,
                'photo_id' => 181,
                'body' => 'Aung San Suu Kyi hätte dazu gesagt: "Die Kunst der Weisheit besteht darin, zu wissen, was man übersehen muß."',
                'created_at' => '2017-09-18 12:59:46',
                'updated_at' => '2017-09-18 12:59:46',
            ),
            248 => 
            array (
                'id' => 249,
                'user_id' => 18,
                'photo_id' => 518,
                'body' => 'Lyndon Johnson hätte dazu gesagt: "Grenzen der Technik: Ein Tauchsieder kocht auch nur mit Wasser."',
                'created_at' => '2017-09-21 17:48:55',
                'updated_at' => '2017-09-21 17:48:55',
            ),
            249 => 
            array (
                'id' => 250,
                'user_id' => 104,
                'photo_id' => 443,
                'body' => 'Ludwig Beethoven hätte dazu gesagt: "Ein Haus wird gebaut, aber ein Zuhause wird geformt."',
                'created_at' => '2017-09-09 03:53:11',
                'updated_at' => '2017-09-09 03:53:11',
            ),
            250 => 
            array (
                'id' => 251,
                'user_id' => 146,
                'photo_id' => 116,
                'body' => 'Oprah Winfrey hätte dazu gesagt: "Bemerke, höre, schweige. Urteile wenig, frage viel."',
                'created_at' => '2017-09-09 14:02:09',
                'updated_at' => '2017-09-09 14:02:09',
            ),
            251 => 
            array (
                'id' => 252,
                'user_id' => 87,
                'photo_id' => 442,
                'body' => 'Indira Gandhi hätte dazu gesagt: "Es ist eine viel schlimmere Art des Stolzes, andere zu verkleinern, als sich selbst zu erheben."',
                'created_at' => '2017-09-12 19:45:35',
                'updated_at' => '2017-09-12 19:45:35',
            ),
            252 => 
            array (
                'id' => 253,
                'user_id' => 125,
                'photo_id' => 585,
                'body' => 'Eva Peron hätte dazu gesagt: "In den Bau der Welt taugt nur der abgeschliffene Stein."',
                'created_at' => '2017-09-07 05:40:10',
                'updated_at' => '2017-09-07 05:40:10',
            ),
            253 => 
            array (
                'id' => 254,
                'user_id' => 134,
                'photo_id' => 282,
                'body' => 'Benazir Bhutto hätte dazu gesagt: "Doch schmecken muß man alles, heiß und kalt, wer jung kein Narr war, wird es, wenn er alt."',
                'created_at' => '2017-09-09 14:09:13',
                'updated_at' => '2017-09-09 14:09:13',
            ),
            254 => 
            array (
                'id' => 255,
                'user_id' => 112,
                'photo_id' => 468,
                'body' => 'Desmond Tutu hätte dazu gesagt: "Gott ist der schweigende Partner bei allen großen Unternehmungen."',
                'created_at' => '2017-09-07 04:04:35',
                'updated_at' => '2017-09-07 04:04:35',
            ),
            255 => 
            array (
                'id' => 256,
                'user_id' => 115,
                'photo_id' => 408,
                'body' => 'Dalai Lama hätte dazu gesagt: "Es wäre dumm, sich über die Außenwelt zu ärgern. Sie kümmert sich nicht darum."',
                'created_at' => '2017-09-13 06:23:19',
                'updated_at' => '2017-09-13 06:23:19',
            ),
            256 => 
            array (
                'id' => 257,
                'user_id' => 34,
                'photo_id' => 136,
                'body' => 'Walt Disney hätte dazu gesagt: "Mit jedem Tag des Älterwerdens, befürchte ich genauso zu werden wie alle Menschen."',
                'created_at' => '2017-09-03 18:51:03',
                'updated_at' => '2017-09-03 18:51:03',
            ),
            257 => 
            array (
                'id' => 258,
                'user_id' => 63,
                'photo_id' => 220,
                'body' => 'Peter Sellers hätte dazu gesagt: "Alkohol macht nicht nur viele Menschen unverträglich, er reduziert zum Glück auch die Anzahl der Unverträglichen."',
                'created_at' => '2017-09-05 22:19:54',
                'updated_at' => '2017-09-05 22:19:54',
            ),
            258 => 
            array (
                'id' => 259,
                'user_id' => 37,
                'photo_id' => 249,
                'body' => 'Barack Obama hätte dazu gesagt: "Ich will den Namen Gottes loben mit einem Lied."',
                'created_at' => '2017-09-21 17:27:15',
                'updated_at' => '2017-09-21 17:27:15',
            ),
            259 => 
            array (
                'id' => 260,
                'user_id' => 21,
                'photo_id' => 670,
                'body' => 'Malcolm X hätte dazu gesagt: "Im Kriege verlieren alle, auch die Sieger."',
                'created_at' => '2017-08-27 00:44:19',
                'updated_at' => '2017-08-27 00:44:19',
            ),
            260 => 
            array (
                'id' => 261,
                'user_id' => 164,
                'photo_id' => 480,
                'body' => 'J.K.Rowling hätte dazu gesagt: "Zum Empfangen und Geben ist der Mensch geschaffen, zu Wirksamkeit und Freude, zum Tun und zum Leiden."',
                'created_at' => '2017-09-14 08:59:11',
                'updated_at' => '2017-09-14 08:59:11',
            ),
            261 => 
            array (
                'id' => 262,
                'user_id' => 150,
                'photo_id' => 464,
                'body' => 'Richard Branson hätte dazu gesagt: "Die Zeit ist ein großer Lehrer. Das Unglück: Sie tötet ihre Schüler."',
                'created_at' => '2017-09-08 06:51:04',
                'updated_at' => '2017-09-08 06:51:04',
            ),
            262 => 
            array (
                'id' => 263,
                'user_id' => 123,
                'photo_id' => 604,
                'body' => 'Pele hätte dazu gesagt: "Vergangenes Leid muß Wohlsein fühlen lehren. Wer nie gedarbt, ist ohne Freude reich."',
                'created_at' => '2017-08-29 13:53:55',
                'updated_at' => '2017-08-29 13:53:55',
            ),
            263 => 
            array (
                'id' => 264,
                'user_id' => 113,
                'photo_id' => 665,
                'body' => 'Angelina Jolie hätte dazu gesagt: "Die Natur ist ein Verschwender, der keine Kosten und Mühen scheut, um sein Werk in kürzester Zeit zu vollenden."',
                'created_at' => '2017-09-08 05:48:55',
                'updated_at' => '2017-09-08 05:48:55',
            ),
            264 => 
            array (
                'id' => 265,
                'user_id' => 188,
                'photo_id' => 324,
                'body' => 'Jesse Owens hätte dazu gesagt: "Gilt es zu hören, sei der Erste. Sei der Letzte, wenn es zu reden gilt."',
                'created_at' => '2017-09-23 07:11:08',
                'updated_at' => '2017-09-23 07:11:08',
            ),
            265 => 
            array (
                'id' => 266,
                'user_id' => 13,
                'photo_id' => 28,
                'body' => 'Ernest Hemingway hätte dazu gesagt: "Der innere Friede hängt immer vom Menschen selbst ab: Der Mensch braucht zu seinem Glück im wahren Verstande nichts als ihn, und braucht, um ihn zu besitzen, nichts als sich."',
                'created_at' => '2017-09-04 01:31:18',
                'updated_at' => '2017-09-04 01:31:18',
            ),
            266 => 
            array (
                'id' => 267,
                'user_id' => 182,
                'photo_id' => 147,
                'body' => 'John Lennon hätte dazu gesagt: "Man kann nicht dem Arbeitnehmer helfen, indem man den Arbeitgeber beseitigt."',
                'created_at' => '2017-09-16 22:35:16',
                'updated_at' => '2017-09-16 22:35:16',
            ),
            267 => 
            array (
                'id' => 268,
                'user_id' => 51,
                'photo_id' => 68,
                'body' => 'Henry Ford hätte dazu gesagt: "Wußten Sie schon, daß gerade ältere Herren junges Gemüse besonders schätzen?"',
                'created_at' => '2017-08-25 08:18:11',
                'updated_at' => '2017-08-25 08:18:11',
            ),
            268 => 
            array (
                'id' => 269,
                'user_id' => 176,
                'photo_id' => 61,
                'body' => 'Haile Selassie hätte dazu gesagt: "Jesus sagte: Steh auf, nimm deine Bahre und geh! Sofort wurde der Mann gesund, nahm seine Bahre und ging."',
                'created_at' => '2017-09-14 23:09:34',
                'updated_at' => '2017-09-14 23:09:34',
            ),
            269 => 
            array (
                'id' => 270,
                'user_id' => 39,
                'photo_id' => 189,
                'body' => 'Joseph Stalin hätte dazu gesagt: "Das Gefallen am Schönen und die Macht der Liebe sind etwas Natürliches, weder befohlen noch verboten, denn die Herzen stehen in Gottes Hand, und er wendet sie."',
                'created_at' => '2017-09-09 12:52:04',
                'updated_at' => '2017-09-09 12:52:04',
            ),
            270 => 
            array (
                'id' => 271,
                'user_id' => 46,
                'photo_id' => 580,
                'body' => 'Lord Baden Powell hätte dazu gesagt: "Gut ist eine lange Wurst und eine kurze Predigt."',
                'created_at' => '2017-09-17 19:50:56',
                'updated_at' => '2017-09-17 19:50:56',
            ),
            271 => 
            array (
                'id' => 272,
                'user_id' => 30,
                'photo_id' => 109,
                'body' => 'Michael Jordon hätte dazu gesagt: "Wir sind nicht, wofür wir uns oft halten, doch wir sind viel mehr, als die meisten von uns ahnen."',
                'created_at' => '2017-09-04 04:50:53',
                'updated_at' => '2017-09-04 04:50:53',
            ),
            272 => 
            array (
                'id' => 273,
                'user_id' => 173,
                'photo_id' => 461,
                'body' => 'V.Lenin hätte dazu gesagt: "Mäßige deinen Zorn; es fallen die Funken erst auf dich; auf den Feind, wenn sie je treffen, zuletzt."',
                'created_at' => '2017-09-12 13:57:43',
                'updated_at' => '2017-09-12 13:57:43',
            ),
            273 => 
            array (
                'id' => 274,
                'user_id' => 85,
                'photo_id' => 425,
                'body' => 'Ingrid Bergman hätte dazu gesagt: "Unter Umständen ist es für manches Kind am besten, wenn es gar nicht erzogen wird."',
                'created_at' => '2017-09-24 11:22:49',
                'updated_at' => '2017-09-24 11:22:49',
            ),
            274 => 
            array (
                'id' => 275,
                'user_id' => 18,
                'photo_id' => 323,
                'body' => 'Fidel Castro hätte dazu gesagt: "Nirgends zeigt sich der Mensch empfindlicher als in seinem Egoismus, und durch nichts ist er leichter zu besiegen als durch ihn."',
                'created_at' => '2017-09-20 06:53:30',
                'updated_at' => '2017-09-20 06:53:30',
            ),
            275 => 
            array (
                'id' => 276,
                'user_id' => 81,
                'photo_id' => 133,
                'body' => 'Oscar Wilde hätte dazu gesagt: "Ein guter Nachbar ist besser als viele böse Verwandten."',
                'created_at' => '2017-08-27 20:33:56',
                'updated_at' => '2017-08-27 20:33:56',
            ),
            276 => 
            array (
                'id' => 277,
                'user_id' => 26,
                'photo_id' => 359,
                'body' => 'Coco Chanel hätte dazu gesagt: "Es regnet auf alle Dächer."',
                'created_at' => '2017-09-14 13:01:08',
                'updated_at' => '2017-09-14 13:01:08',
            ),
            277 => 
            array (
                'id' => 278,
                'user_id' => 80,
                'photo_id' => 474,
                'body' => 'Pope Francis hätte dazu gesagt: "Was man heute politische Ansichten nennt, ist meist nur der Ausdruck wirtschaftlicher und sozialer Interessen."',
                'created_at' => '2017-09-02 11:19:25',
                'updated_at' => '2017-09-02 11:19:25',
            ),
            278 => 
            array (
                'id' => 279,
                'user_id' => 55,
                'photo_id' => 486,
                'body' => 'Amelia Earhart hätte dazu gesagt: "Und dann war da noch die Frustrierte, die sagte: "Ich habe nie bekommen, was ich wollte. Ich wollte, ich hätte das bekommen, was ich wollte. Aber nicht einmal das will ich."',
                'created_at' => '2017-09-08 05:31:05',
                'updated_at' => '2017-09-08 05:31:05',
            ),
            279 => 
            array (
                'id' => 280,
                'user_id' => 195,
                'photo_id' => 632,
                'body' => 'Adolf Hitler hätte dazu gesagt: "In dem ehelichen Leben soll das vereinigte Paar gleichsam eine einzige moralische Person ausmachen, welche durch den Verstand des Mannes und den Geschmack der Frauen belebt und regiert wird."',
                'created_at' => '2017-09-10 10:45:16',
                'updated_at' => '2017-09-10 10:45:16',
            ),
            280 => 
            array (
                'id' => 281,
                'user_id' => 44,
                'photo_id' => 462,
                'body' => 'Sting hätte dazu gesagt: "Nichts ist schwerer zu ertragen als Reißverschluß auf vollen Magen."',
                'created_at' => '2017-09-15 09:18:18',
                'updated_at' => '2017-09-15 09:18:18',
            ),
            281 => 
            array (
                'id' => 282,
                'user_id' => 182,
                'photo_id' => 495,
                'body' => 'Mary Magdalene hätte dazu gesagt: "Das Gewissen ist der Puls der Vernunft."',
                'created_at' => '2017-09-15 00:30:25',
                'updated_at' => '2017-09-15 00:30:25',
            ),
            282 => 
            array (
                'id' => 283,
                'user_id' => 107,
                'photo_id' => 324,
                'body' => 'Alfred Hitchcock hätte dazu gesagt: "Wer mit dem Kopf durch die Wand will, holt sich nur Beulen."',
                'created_at' => '2017-09-23 20:40:58',
                'updated_at' => '2017-09-23 20:40:58',
            ),
            283 => 
            array (
                'id' => 284,
                'user_id' => 150,
                'photo_id' => 529,
                'body' => 'Michael Jackson hätte dazu gesagt: "Nur ein Tor zertrümmert den Spiegel, wenn ihm das Spiegelbild mißfällt."',
                'created_at' => '2017-09-14 12:31:59',
                'updated_at' => '2017-09-14 12:31:59',
            ),
            284 => 
            array (
                'id' => 285,
                'user_id' => 122,
                'photo_id' => 117,
                'body' => 'Madonna hätte dazu gesagt: "Faulheit, Frauendienst, Kränklichkeit, zu große Anhänglichkeit an den Geburtsort, Genügsamkeit und Furchtsamkeit, diese sind sechs Hindernisse der Größe."',
                'created_at' => '2017-09-06 19:06:29',
                'updated_at' => '2017-09-06 19:06:29',
            ),
            285 => 
            array (
                'id' => 286,
                'user_id' => 138,
                'photo_id' => 627,
                'body' => 'Mata Hari hätte dazu gesagt: "Laß euch nicht mit falschen Göttern ein!"',
                'created_at' => '2017-09-02 22:52:10',
                'updated_at' => '2017-09-02 22:52:10',
            ),
            286 => 
            array (
                'id' => 287,
                'user_id' => 28,
                'photo_id' => 114,
                'body' => 'Cleopatra hätte dazu gesagt: "Wer sich entschieden hat, etwas zu tun, und an nichts anderes denkt, überwindet alle Hindernisse."',
                'created_at' => '2017-08-27 15:46:32',
                'updated_at' => '2017-08-27 15:46:32',
            ),
            287 => 
            array (
                'id' => 288,
                'user_id' => 70,
                'photo_id' => 434,
                'body' => 'Grace Kelly hätte dazu gesagt: "Würden die Pforten der Wahrnehmung gereinigt, erschiene den Menschen alles, wie es ist: unendlich."',
                'created_at' => '2017-09-12 06:10:20',
                'updated_at' => '2017-09-12 06:10:20',
            ),
            288 => 
            array (
                'id' => 289,
                'user_id' => 97,
                'photo_id' => 595,
                'body' => 'Steve Jobs hätte dazu gesagt: "Es gibt nicht nur einen bunten Hund in der Welt."',
                'created_at' => '2017-09-07 11:15:29',
                'updated_at' => '2017-09-07 11:15:29',
            ),
            289 => 
            array (
                'id' => 290,
                'user_id' => 105,
                'photo_id' => 418,
                'body' => 'Ronald Reagan hätte dazu gesagt: "Als Sklaven und Herren ihrer Eigenliebe leben die Menschen dahin, nicht um zu leben, sondern um andere glauben zu machen, sie hätten gelebt."',
                'created_at' => '2017-09-18 12:59:47',
                'updated_at' => '2017-09-18 12:59:47',
            ),
            290 => 
            array (
                'id' => 291,
                'user_id' => 97,
                'photo_id' => 412,
                'body' => 'Lionel Messi hätte dazu gesagt: "Du lebst nicht für dich allein auf Erden."',
                'created_at' => '2017-09-21 17:48:56',
                'updated_at' => '2017-09-21 17:48:56',
            ),
            291 => 
            array (
                'id' => 292,
                'user_id' => 82,
                'photo_id' => 476,
                'body' => 'Babe Ruth hätte dazu gesagt: "Was ist der Mensch, daß du seiner gedenkst?"',
                'created_at' => '2017-09-09 03:53:12',
                'updated_at' => '2017-09-09 03:53:12',
            ),
            292 => 
            array (
                'id' => 293,
                'user_id' => 9,
                'photo_id' => 19,
                'body' => 'Bob Geldof hätte dazu gesagt: "Solange die Menschen sterben können und das Leben lieben, wird der Arzt verspottet und gut bezahlt werden."',
                'created_at' => '2017-09-09 14:02:10',
                'updated_at' => '2017-09-09 14:02:10',
            ),
            293 => 
            array (
                'id' => 294,
                'user_id' => 186,
                'photo_id' => 444,
                'body' => 'Roger Federer hätte dazu gesagt: "Gastsein ist gut. Heimkommen ist besser."',
                'created_at' => '2017-09-12 19:45:36',
                'updated_at' => '2017-09-12 19:45:36',
            ),
            294 => 
            array (
                'id' => 295,
                'user_id' => 143,
                'photo_id' => 437,
                'body' => 'Sigmund Freud hätte dazu gesagt: "Wer die Vergangenheit preist, tadelt die Gegenwart."',
                'created_at' => '2017-09-07 05:40:11',
                'updated_at' => '2017-09-07 05:40:11',
            ),
            295 => 
            array (
                'id' => 296,
                'user_id' => 194,
                'photo_id' => 532,
                'body' => 'Woodrow Wilson hätte dazu gesagt: "Beten heißt, liebend an Jesus denken."',
                'created_at' => '2017-09-09 14:09:14',
                'updated_at' => '2017-09-09 14:09:14',
            ),
            296 => 
            array (
                'id' => 297,
                'user_id' => 40,
                'photo_id' => 455,
                'body' => 'Mao Zedong hätte dazu gesagt: "Ich bin nicht entmutigt, weil jeder als falsch verworfene Versuch ein weiterer Schritt vorwärts ist."',
                'created_at' => '2017-09-07 04:04:36',
                'updated_at' => '2017-09-07 04:04:36',
            ),
            297 => 
            array (
                'id' => 298,
                'user_id' => 29,
                'photo_id' => 35,
                'body' => 'Katherine Hepburn hätte dazu gesagt: "Doppelt lebt, wer auch Vergangenes genießt."',
                'created_at' => '2017-09-13 06:23:20',
                'updated_at' => '2017-09-13 06:23:20',
            ),
            298 => 
            array (
                'id' => 299,
                'user_id' => 17,
                'photo_id' => 550,
                'body' => 'Audrey Hepburn hätte dazu gesagt: "Der Busch hat Augen, der Baumstumpf trägt einen Hut."',
                'created_at' => '2017-09-03 18:51:04',
                'updated_at' => '2017-09-03 18:51:04',
            ),
            299 => 
            array (
                'id' => 300,
                'user_id' => 147,
                'photo_id' => 45,
                'body' => 'David Beckham hätte dazu gesagt: "Die Nacht ist die Mutter von Gedanken."',
                'created_at' => '2017-09-05 22:19:55',
                'updated_at' => '2017-09-05 22:19:55',
            ),
            300 => 
            array (
                'id' => 301,
                'user_id' => 96,
                'photo_id' => 101,
                'body' => 'Usain Bolt hätte dazu gesagt: "Das Leben ist eine große Gelegenheit, und es ist sehr schade, wenn der Mensch das erst zu spät erkennt."',
                'created_at' => '2017-09-21 17:27:16',
                'updated_at' => '2017-09-21 17:27:16',
            ),
            301 => 
            array (
                'id' => 302,
                'user_id' => 45,
                'photo_id' => 78,
                'body' => 'Carl Lewis hätte dazu gesagt: "Herr, ich rufe zu dir. Eile mir zur Hilfe; höre auf meine Stimme, wenn ich zu dir rufe."',
                'created_at' => '2017-08-27 00:44:20',
                'updated_at' => '2017-08-27 00:44:20',
            ),
            302 => 
            array (
                'id' => 303,
                'user_id' => 70,
                'photo_id' => 343,
                'body' => 'Prince Charles hätte dazu gesagt: "Seit zehn Jahren versuchen viele Ostdeutsche möglichst schnell Wessis zu werden. Natürlich ohne ihre Identität dabei aufzugeben. Hundertprozentig ist das jedoch nur ganz wenigen gelungen. Aber immerhin gibt es inzwischen',
                'created_at' => '2017-09-14 08:59:12',
                'updated_at' => '2017-09-14 08:59:12',
            ),
            303 => 
            array (
                'id' => 304,
                'user_id' => 189,
                'photo_id' => 149,
                'body' => 'Jacqueline Kennedy Onassis hätte dazu gesagt: "Verlaßt euch nicht auf Gewalt!"',
                'created_at' => '2017-09-08 06:51:05',
                'updated_at' => '2017-09-08 06:51:05',
            ),
            304 => 
            array (
                'id' => 305,
                'user_id' => 102,
                'photo_id' => 316,
                'body' => 'C.S. Lewis hätte dazu gesagt: "Ermuntert einander mit Psalmen und Lobgesängen und geistlichen Liedern, singt und spielt dem Herrn in euren Herzen."',
                'created_at' => '2017-08-29 13:53:56',
                'updated_at' => '2017-08-29 13:53:56',
            ),
            305 => 
            array (
                'id' => 306,
                'user_id' => 95,
                'photo_id' => 410,
                'body' => 'Billie Holiday hätte dazu gesagt: "Das einzige Mittel, den Irrtum zu vermeiden, ist die Unwissenheit."',
                'created_at' => '2017-09-08 05:48:56',
                'updated_at' => '2017-09-08 05:48:56',
            ),
            306 => 
            array (
                'id' => 307,
                'user_id' => 28,
                'photo_id' => 192,
                'body' => 'J.R.R. Tolkien hätte dazu gesagt: "Willst du fremde Fehler zählen, heb an deinen an zu zählen. Ist mir recht, wird dir die Weile zu den fremden Fehlern fehlen."',
                'created_at' => '2017-09-23 07:11:09',
                'updated_at' => '2017-09-23 07:11:09',
            ),
            307 => 
            array (
                'id' => 308,
                'user_id' => 17,
                'photo_id' => 318,
                'body' => 'Billie Jean King hätte dazu gesagt: "Trau niemals einem Menschen, der sich die Haare färbt. Er färbt auch seine Gefühle."',
                'created_at' => '2017-09-04 01:31:19',
                'updated_at' => '2017-09-04 01:31:19',
            ),
            308 => 
            array (
                'id' => 309,
                'user_id' => 160,
                'photo_id' => 322,
                'body' => 'Anne Frank hätte dazu gesagt: "Treibt uns der Ehrgeiz zur Einsamkeit? Die Antwort muß lauten: Ja! Denn was ist ihm mehr zuwider als Gemeinsamkeit? Was ist ihm wichtiger als Bewegungsfreiheit?"',
                'created_at' => '2017-09-16 22:35:17',
                'updated_at' => '2017-09-16 22:35:17',
            ),
            309 => 
            array (
                'id' => 310,
                'user_id' => 137,
                'photo_id' => 227,
                'body' => 'Simon Bolivar hätte dazu gesagt: "Was ein Leben an Länge gewinnt, verliert es meist an Tiefe."',
                'created_at' => '2017-08-25 08:18:12',
                'updated_at' => '2017-08-25 08:18:12',
            ),
            310 => 
            array (
                'id' => 311,
                'user_id' => 77,
                'photo_id' => 372,
                'body' => 'Marie Antoinette hätte dazu gesagt: "Die Vergangenheit und die Erinnerung haben eine unendliche Kraft, und wenn auch schmerzliche Sehnsucht daraus quillt, sich ihnen hinzugeben, so liegt darin doch ein unaussprechlich süßer Genuß."',
                'created_at' => '2017-09-14 23:09:35',
                'updated_at' => '2017-09-14 23:09:35',
            ),
            311 => 
            array (
                'id' => 312,
                'user_id' => 119,
                'photo_id' => 398,
                'body' => 'Christiano Ronaldo hätte dazu gesagt: "Im Wald lehnt sich Baum an Baum, also warum nicht Mensch an Mensch?"',
                'created_at' => '2017-09-09 12:52:05',
                'updated_at' => '2017-09-09 12:52:05',
            ),
            312 => 
            array (
                'id' => 313,
                'user_id' => 83,
                'photo_id' => 391,
                'body' => 'Emmeline Pankhurst hätte dazu gesagt: "Nur der, der gar nichts tut, macht einen Fehler."',
                'created_at' => '2017-09-17 19:50:57',
                'updated_at' => '2017-09-17 19:50:57',
            ),
            313 => 
            array (
                'id' => 314,
                'user_id' => 39,
                'photo_id' => 528,
                'body' => 'Emile Zatopek hätte dazu gesagt: "Wer sich getroffen fühlt, ist gemeint."',
                'created_at' => '2017-09-04 04:50:54',
                'updated_at' => '2017-09-04 04:50:54',
            ),
            314 => 
            array (
                'id' => 315,
                'user_id' => 180,
                'photo_id' => 223,
                'body' => 'Lech Walesa hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-12 13:57:44',
                'updated_at' => '2017-09-12 13:57:44',
            ),
            315 => 
            array (
                'id' => 316,
                'user_id' => 24,
                'photo_id' => 135,
                'body' => 'Julie Andrews hätte dazu gesagt: "Bin, der mich sagen hört, »umsonst« – heißt »gratis«, doch auch »vergeblich« –, Gnade wie Nichtigkeit gleichermaßen."',
                'created_at' => '2017-09-24 11:22:50',
                'updated_at' => '2017-09-24 11:22:50',
            ),
            316 => 
            array (
                'id' => 317,
                'user_id' => 136,
                'photo_id' => 251,
                'body' => 'Florence Nightingale hätte dazu gesagt: "Sein Leid in sich fressen."',
                'created_at' => '2017-09-20 06:53:31',
                'updated_at' => '2017-09-20 06:53:31',
            ),
            317 => 
            array (
                'id' => 318,
                'user_id' => 191,
                'photo_id' => 594,
                'body' => 'Marie Curie hätte dazu gesagt: "Solang ein Weib liebt, liebt es in einem fort – ein Mann hat dazwischen zu tun."',
                'created_at' => '2017-08-27 20:33:57',
                'updated_at' => '2017-08-27 20:33:57',
            ),
            318 => 
            array (
                'id' => 319,
                'user_id' => 132,
                'photo_id' => 225,
                'body' => 'Stephen Hawking hätte dazu gesagt: "Mit Fristgeben gedeiht der Handel."',
                'created_at' => '2017-09-14 13:01:09',
                'updated_at' => '2017-09-14 13:01:09',
            ),
            319 => 
            array (
                'id' => 320,
                'user_id' => 43,
                'photo_id' => 601,
                'body' => 'Tim Berners Lee hätte dazu gesagt: "Flausen im Kopf sorgen für die Federung des Denkapparates."',
                'created_at' => '2017-09-02 11:19:26',
                'updated_at' => '2017-09-02 11:19:26',
            ),
            320 => 
            array (
                'id' => 321,
                'user_id' => 66,
                'photo_id' => 394,
                'body' => 'Lance Armstrong hätte dazu gesagt: "Wer sich nicht schämt, etwas nicht zu können, und sich nicht ärgert, etwas nicht zu können, der kommt voran."',
                'created_at' => '2017-09-08 05:31:06',
                'updated_at' => '2017-09-08 05:31:06',
            ),
            321 => 
            array (
                'id' => 322,
                'user_id' => 15,
                'photo_id' => 400,
                'body' => 'Shakira hätte dazu gesagt: "Werden die Eisheiligen im Hundertjährigen Eskimo-Kalender als heiße Jungs aufgeführt?"',
                'created_at' => '2017-09-10 10:45:17',
                'updated_at' => '2017-09-10 10:45:17',
            ),
            322 => 
            array (
                'id' => 323,
                'user_id' => 43,
                'photo_id' => 509,
                'body' => 'Jon Stewart hätte dazu gesagt: "Viele verabschieden sich von dieser Welt, ohne jemals etwas gesagt zu haben."',
                'created_at' => '2017-09-15 09:18:19',
                'updated_at' => '2017-09-15 09:18:19',
            ),
            323 => 
            array (
                'id' => 324,
                'user_id' => 19,
                'photo_id' => 361,
                'body' => 'Wright Brothers hätte dazu gesagt: "Es ist weise, das Glück wahrzunehmen, das unser Herrgott einem zuschickt."',
                'created_at' => '2017-09-15 00:30:26',
                'updated_at' => '2017-09-15 00:30:26',
            ),
            324 => 
            array (
                'id' => 325,
                'user_id' => 191,
                'photo_id' => 257,
                'body' => 'Paul Krugman hätte dazu gesagt: "Rache ist teuer."',
                'created_at' => '2017-09-23 20:40:59',
                'updated_at' => '2017-09-23 20:40:59',
            ),
            325 => 
            array (
                'id' => 326,
                'user_id' => 134,
                'photo_id' => 488,
                'body' => 'Malala Yousafzai hätte dazu gesagt: "Die Macht ist bei den Fröhlichen."',
                'created_at' => '2017-09-06 19:16:30',
                'updated_at' => '2017-09-06 19:16:30',
            ),
            326 => 
            array (
                'id' => 327,
                'user_id' => 31,
                'photo_id' => 523,
                'body' => 'Marilyn Monroe hätte dazu gesagt: "Wenn du ein Geheimnis nicht bewahren willst, dann sag es einer Frau."',
                'created_at' => '2017-09-06 19:06:30',
                'updated_at' => '2017-09-06 19:06:30',
            ),
            327 => 
            array (
                'id' => 328,
                'user_id' => 33,
                'photo_id' => 542,
                'body' => 'Abraham Lincoln hätte dazu gesagt: "Wenn man nichts hat, was man liebt, muß man lieben, was man hat."',
                'created_at' => '2017-09-02 22:52:11',
                'updated_at' => '2017-09-02 22:52:11',
            ),
            328 => 
            array (
                'id' => 329,
                'user_id' => 32,
                'photo_id' => 118,
                'body' => 'Mother Teresa hätte dazu gesagt: "Ein guter Anfang ist ein halber Erfolg."',
                'created_at' => '2017-08-27 15:46:33',
                'updated_at' => '2017-08-27 15:46:33',
            ),
            329 => 
            array (
                'id' => 330,
                'user_id' => 70,
                'photo_id' => 87,
                'body' => 'John F. Kennedy hätte dazu gesagt: "Popularität hat für mich immer etwas Unbehagliches."',
                'created_at' => '2017-09-12 06:10:21',
                'updated_at' => '2017-09-12 06:10:21',
            ),
            330 => 
            array (
                'id' => 331,
                'user_id' => 178,
                'photo_id' => 347,
                'body' => 'Martin Luther King hätte dazu gesagt: "Die Ehre ist die Poesie der Pflicht!"',
                'created_at' => '2017-09-07 11:15:30',
                'updated_at' => '2017-09-07 11:15:30',
            ),
            331 => 
            array (
                'id' => 332,
                'user_id' => 56,
                'photo_id' => 560,
                'body' => 'Nelson Mandela hätte dazu gesagt: "Ein Mensch ohne Geld ist wie ein Wolf ohne Zähne."',
                'created_at' => '2017-09-18 12:59:48',
                'updated_at' => '2017-09-18 12:59:48',
            ),
            332 => 
            array (
                'id' => 333,
                'user_id' => 163,
                'photo_id' => 465,
                'body' => 'Winston Churchill hätte dazu gesagt: "Es ist irrelevant, wie lange sich die Dummköpfe unter dem Baum der Weisheit und Barmherzigkeit aufhalten. Für sie wird kein einziger Apfel herunter fallen."',
                'created_at' => '2017-09-21 17:48:57',
                'updated_at' => '2017-09-21 17:48:57',
            ),
            333 => 
            array (
                'id' => 334,
                'user_id' => 17,
                'photo_id' => 465,
                'body' => 'Bill Gates hätte dazu gesagt: "Christus und Moses, alle Seher und Magier waren "in der Ruhe". Martha arbeitete sich ab - Maria baute sich auf. Darum sagte Christus von Maria, sie habe das bessere Teil erwählt, da sie sich nicht zur Hausmagd erniedrigte gl',
                'created_at' => '2017-09-09 03:53:13',
                'updated_at' => '2017-09-09 03:53:13',
            ),
            334 => 
            array (
                'id' => 335,
                'user_id' => 182,
                'photo_id' => 570,
                'body' => 'Muhammad Ali hätte dazu gesagt: "Wo du zu tadeln hast, komm und hilf!"',
                'created_at' => '2017-09-09 14:02:11',
                'updated_at' => '2017-09-09 14:02:11',
            ),
            335 => 
            array (
                'id' => 336,
                'user_id' => 81,
                'photo_id' => 46,
                'body' => 'Mahatma Gandhi hätte dazu gesagt: "Lebendig ist das Wort Gottes, kraftvoll und schärfer als jedes zweischneidige Schwert."',
                'created_at' => '2017-09-12 19:45:37',
                'updated_at' => '2017-09-12 19:45:37',
            ),
            336 => 
            array (
                'id' => 337,
                'user_id' => 13,
                'photo_id' => 559,
                'body' => 'Margaret Thatcher hätte dazu gesagt: "Wer niemals außer sich gerät, wird niemals in sich gehen."',
                'created_at' => '2017-09-07 05:40:12',
                'updated_at' => '2017-09-07 05:40:12',
            ),
            337 => 
            array (
                'id' => 338,
                'user_id' => 147,
                'photo_id' => 373,
                'body' => 'Charles de Gaulle hätte dazu gesagt: "Wer nicht läuft, gelangt nie ans Ziel!"',
                'created_at' => '2017-09-09 14:09:15',
                'updated_at' => '2017-09-09 14:09:15',
            ),
            338 => 
            array (
                'id' => 339,
                'user_id' => 91,
                'photo_id' => 575,
                'body' => 'Christopher Columbus hätte dazu gesagt: "Machen Sie es sich zur Aufgabe, höheren Ansprüchen zu genügen, als andere an Sie stellen."',
                'created_at' => '2017-09-07 04:04:37',
                'updated_at' => '2017-09-07 04:04:37',
            ),
            339 => 
            array (
                'id' => 340,
                'user_id' => 44,
                'photo_id' => 654,
                'body' => 'George Orwell hätte dazu gesagt: "Laß die anderen in Ruhe, sorge für dich selbst."',
                'created_at' => '2017-09-13 06:23:21',
                'updated_at' => '2017-09-13 06:23:21',
            ),
            340 => 
            array (
                'id' => 341,
                'user_id' => 163,
                'photo_id' => 165,
                'body' => 'Charles Darwin hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-03 18:51:05',
                'updated_at' => '2017-09-03 18:51:05',
            ),
            341 => 
            array (
                'id' => 342,
                'user_id' => 98,
                'photo_id' => 329,
                'body' => 'Elvis Presley hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-05 22:19:56',
                'updated_at' => '2017-09-05 22:19:56',
            ),
            342 => 
            array (
                'id' => 343,
                'user_id' => 96,
                'photo_id' => 594,
                'body' => 'Albert Einstein hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-21 17:27:17',
                'updated_at' => '2017-09-21 17:27:17',
            ),
            343 => 
            array (
                'id' => 344,
                'user_id' => 178,
                'photo_id' => 632,
                'body' => 'Paul McCartney hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-08-27 00:44:21',
                'updated_at' => '2017-08-27 00:44:21',
            ),
            344 => 
            array (
                'id' => 345,
                'user_id' => 28,
                'photo_id' => 436,
                'body' => 'Plato hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-14 08:59:13',
                'updated_at' => '2017-09-14 08:59:13',
            ),
            345 => 
            array (
                'id' => 346,
                'user_id' => 188,
                'photo_id' => 73,
                'body' => 'Queen Elizabeth hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-08 06:51:06',
                'updated_at' => '2017-09-08 06:51:06',
            ),
            346 => 
            array (
                'id' => 347,
                'user_id' => 121,
                'photo_id' => 233,
                'body' => 'Queen Victoria hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-08-29 13:53:57',
                'updated_at' => '2017-08-29 13:53:57',
            ),
            347 => 
            array (
                'id' => 348,
                'user_id' => 120,
                'photo_id' => 398,
                'body' => 'John M Keynes hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-08 05:48:57',
                'updated_at' => '2017-09-08 05:48:57',
            ),
            348 => 
            array (
                'id' => 349,
                'user_id' => 67,
                'photo_id' => 405,
                'body' => 'Mikhail Gorbachev hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-23 07:11:10',
                'updated_at' => '2017-09-23 07:11:10',
            ),
            349 => 
            array (
                'id' => 350,
                'user_id' => 161,
                'photo_id' => 136,
                'body' => 'Jawaharlal Nehru hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-04 01:31:20',
                'updated_at' => '2017-09-04 01:31:20',
            ),
            350 => 
            array (
                'id' => 351,
                'user_id' => 24,
                'photo_id' => 44,
                'body' => 'Leonardo da Vinci hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-16 22:35:18',
                'updated_at' => '2017-09-16 22:35:18',
            ),
            351 => 
            array (
                'id' => 352,
                'user_id' => 195,
                'photo_id' => 137,
                'body' => 'Louis Pasteur hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-08-25 08:18:13',
                'updated_at' => '2017-08-25 08:18:13',
            ),
            352 => 
            array (
                'id' => 353,
                'user_id' => 86,
                'photo_id' => 55,
                'body' => 'Leo Tolstoy hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-14 23:09:36',
                'updated_at' => '2017-09-14 23:09:36',
            ),
            353 => 
            array (
                'id' => 354,
                'user_id' => 89,
                'photo_id' => 45,
                'body' => 'Pablo Picasso hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-09 12:52:06',
                'updated_at' => '2017-09-09 12:52:06',
            ),
            354 => 
            array (
                'id' => 355,
                'user_id' => 195,
                'photo_id' => 686,
                'body' => 'Vincent Van Gogh hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-17 19:50:58',
                'updated_at' => '2017-09-17 19:50:58',
            ),
            355 => 
            array (
                'id' => 356,
                'user_id' => 185,
                'photo_id' => 452,
                'body' => 'Franklin D. Roosevelt hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-04 04:50:55',
                'updated_at' => '2017-09-04 04:50:55',
            ),
            356 => 
            array (
                'id' => 357,
                'user_id' => 154,
                'photo_id' => 657,
                'body' => 'Pope John Paul II hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-12 13:57:45',
                'updated_at' => '2017-09-12 13:57:45',
            ),
            357 => 
            array (
                'id' => 358,
                'user_id' => 18,
                'photo_id' => 436,
                'body' => 'Thomas Edison hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-24 11:22:51',
                'updated_at' => '2017-09-24 11:22:51',
            ),
            358 => 
            array (
                'id' => 359,
                'user_id' => 7,
                'photo_id' => 109,
                'body' => 'Rosa Parks hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-20 06:53:32',
                'updated_at' => '2017-09-20 06:53:32',
            ),
            359 => 
            array (
                'id' => 360,
                'user_id' => 176,
                'photo_id' => 292,
                'body' => 'Aung San Suu Kyi hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-08-27 20:33:58',
                'updated_at' => '2017-08-27 20:33:58',
            ),
            360 => 
            array (
                'id' => 361,
                'user_id' => 142,
                'photo_id' => 546,
                'body' => 'Lyndon Johnson hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-14 13:01:10',
                'updated_at' => '2017-09-14 13:01:10',
            ),
            361 => 
            array (
                'id' => 362,
                'user_id' => 96,
                'photo_id' => 303,
                'body' => 'Ludwig Beethoven hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-02 11:19:27',
                'updated_at' => '2017-09-02 11:19:27',
            ),
            362 => 
            array (
                'id' => 363,
                'user_id' => 83,
                'photo_id' => 380,
                'body' => 'Oprah Winfrey hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-08 05:31:07',
                'updated_at' => '2017-09-08 05:31:07',
            ),
            363 => 
            array (
                'id' => 364,
                'user_id' => 182,
                'photo_id' => 385,
                'body' => 'Indira Gandhi hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-10 10:45:18',
                'updated_at' => '2017-09-10 10:45:18',
            ),
            364 => 
            array (
                'id' => 365,
                'user_id' => 39,
                'photo_id' => 607,
                'body' => 'Eva Peron hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 09:18:20',
                'updated_at' => '2017-09-15 09:18:20',
            ),
            365 => 
            array (
                'id' => 366,
                'user_id' => 179,
                'photo_id' => 576,
                'body' => 'Benazir Bhutto hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 00:30:27',
                'updated_at' => '2017-09-15 00:30:27',
            ),
            366 => 
            array (
                'id' => 367,
                'user_id' => 191,
                'photo_id' => 549,
                'body' => 'Desmond Tutu hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            367 => 
            array (
                'id' => 368,
                'user_id' => 65,
                'photo_id' => 163,
                'body' => 'Dalai Lama hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            368 => 
            array (
                'id' => 369,
                'user_id' => 84,
                'photo_id' => 92,
                'body' => 'Walt Disney hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-06 19:06:31',
                'updated_at' => '2017-09-06 19:06:31',
            ),
            369 => 
            array (
                'id' => 370,
                'user_id' => 40,
                'photo_id' => 226,
                'body' => 'Peter Sellers hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-02 22:52:12',
                'updated_at' => '2017-09-02 22:52:12',
            ),
            370 => 
            array (
                'id' => 371,
                'user_id' => 75,
                'photo_id' => 567,
                'body' => 'Barack Obama hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-08-27 15:46:34',
                'updated_at' => '2017-08-27 15:46:34',
            ),
            371 => 
            array (
                'id' => 372,
                'user_id' => 191,
                'photo_id' => 499,
                'body' => 'Malcolm X hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-12 06:10:22',
                'updated_at' => '2017-09-12 06:10:22',
            ),
            372 => 
            array (
                'id' => 373,
                'user_id' => 76,
                'photo_id' => 436,
                'body' => 'J.K.Rowling hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-07 11:15:31',
                'updated_at' => '2017-09-07 11:15:31',
            ),
            373 => 
            array (
                'id' => 374,
                'user_id' => 92,
                'photo_id' => 3,
                'body' => 'Richard Branson hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-18 12:59:49',
                'updated_at' => '2017-09-18 12:59:49',
            ),
            374 => 
            array (
                'id' => 375,
                'user_id' => 19,
                'photo_id' => 225,
                'body' => 'Pele hätte dazu gesagt: "Ich bin so aufgeregt."',
                'created_at' => '2017-09-21 17:48:58',
                'updated_at' => '2017-09-21 17:48:58',
            ),
            375 => 
            array (
                'id' => 376,
                'user_id' => 134,
                'photo_id' => 12,
                'body' => 'Angelina Jolie hätte dazu gesagt: "Wo will man aber Weisheit finden, und wo ist die Stätte der Einsicht?"',
                'created_at' => '2017-09-09 03:53:14',
                'updated_at' => '2017-09-09 03:53:14',
            ),
            376 => 
            array (
                'id' => 377,
                'user_id' => 73,
                'photo_id' => 248,
                'body' => 'Jesse Owens hätte dazu gesagt: "Bevor du sprichst, denke siebenmal darüber nach!"',
                'created_at' => '2017-09-09 14:02:12',
                'updated_at' => '2017-09-09 14:02:12',
            ),
            377 => 
            array (
                'id' => 378,
                'user_id' => 165,
                'photo_id' => 573,
                'body' => 'Ernest Hemingway hätte dazu gesagt: "Nichts ist einem Menschen willkommener als ein Freund zur rechten Zeit."',
                'created_at' => '2017-09-12 19:45:38',
                'updated_at' => '2017-09-12 19:45:38',
            ),
            378 => 
            array (
                'id' => 379,
                'user_id' => 73,
                'photo_id' => 584,
                'body' => 'John Lennon hätte dazu gesagt: "Das Alter ist eine Reisende der Nacht. die Erde verbirgt sich und der Himmel wird sichtbar."',
                'created_at' => '2017-09-07 05:40:13',
                'updated_at' => '2017-09-07 05:40:13',
            ),
            379 => 
            array (
                'id' => 380,
                'user_id' => 124,
                'photo_id' => 582,
                'body' => 'Henry Ford hätte dazu gesagt: "Wer den anderen liebt, hat das Gesetz erfüllt."',
                'created_at' => '2017-09-09 14:09:16',
                'updated_at' => '2017-09-09 14:09:16',
            ),
            380 => 
            array (
                'id' => 381,
                'user_id' => 126,
                'photo_id' => 244,
                'body' => 'Haile Selassie hätte dazu gesagt: "Offene Hände schenken mehr als saubere Finger."',
                'created_at' => '2017-09-07 04:04:38',
                'updated_at' => '2017-09-07 04:04:38',
            ),
            381 => 
            array (
                'id' => 382,
                'user_id' => 158,
                'photo_id' => 650,
                'body' => 'Joseph Stalin hätte dazu gesagt: "Wer heile Hände hat, dem tut das Gift nichts an; Das Böse schadet nicht dem, der es nicht getan."',
                'created_at' => '2017-09-13 06:23:22',
                'updated_at' => '2017-09-13 06:23:22',
            ),
            382 => 
            array (
                'id' => 383,
                'user_id' => 49,
                'photo_id' => 660,
                'body' => 'Lord Baden Powell hätte dazu gesagt: "Kummer verdaut man am besten, wenn man ihn in Wein auflöst."',
                'created_at' => '2017-09-03 18:51:06',
                'updated_at' => '2017-09-03 18:51:06',
            ),
            383 => 
            array (
                'id' => 384,
                'user_id' => 123,
                'photo_id' => 132,
                'body' => 'Michael Jordon hätte dazu gesagt: "Die Kunst der Weisheit besteht darin, zu wissen, was man übersehen muß."',
                'created_at' => '2017-09-05 22:19:57',
                'updated_at' => '2017-09-05 22:19:57',
            ),
            384 => 
            array (
                'id' => 385,
                'user_id' => 126,
                'photo_id' => 483,
                'body' => 'V.Lenin hätte dazu gesagt: "Grenzen der Technik: Ein Tauchsieder kocht auch nur mit Wasser."',
                'created_at' => '2017-09-21 17:27:18',
                'updated_at' => '2017-09-21 17:27:18',
            ),
            385 => 
            array (
                'id' => 386,
                'user_id' => 35,
                'photo_id' => 469,
                'body' => 'Ingrid Bergman hätte dazu gesagt: "Ein Haus wird gebaut, aber ein Zuhause wird geformt."',
                'created_at' => '2017-08-27 00:44:22',
                'updated_at' => '2017-08-27 00:44:22',
            ),
            386 => 
            array (
                'id' => 387,
                'user_id' => 176,
                'photo_id' => 76,
                'body' => 'Fidel Castro hätte dazu gesagt: "Bemerke, höre, schweige. Urteile wenig, frage viel."',
                'created_at' => '2017-09-14 08:59:14',
                'updated_at' => '2017-09-14 08:59:14',
            ),
            387 => 
            array (
                'id' => 388,
                'user_id' => 28,
                'photo_id' => 524,
                'body' => 'Oscar Wilde hätte dazu gesagt: "Es ist eine viel schlimmere Art des Stolzes, andere zu verkleinern, als sich selbst zu erheben."',
                'created_at' => '2017-09-08 06:51:07',
                'updated_at' => '2017-09-08 06:51:07',
            ),
            388 => 
            array (
                'id' => 389,
                'user_id' => 139,
                'photo_id' => 587,
                'body' => 'Coco Chanel hätte dazu gesagt: "In den Bau der Welt taugt nur der abgeschliffene Stein."',
                'created_at' => '2017-08-29 13:53:58',
                'updated_at' => '2017-08-29 13:53:58',
            ),
            389 => 
            array (
                'id' => 390,
                'user_id' => 194,
                'photo_id' => 623,
                'body' => 'Pope Francis hätte dazu gesagt: "Doch schmecken muß man alles, heiß und kalt, wer jung kein Narr war, wird es, wenn er alt."',
                'created_at' => '2017-09-08 05:48:58',
                'updated_at' => '2017-09-08 05:48:58',
            ),
            390 => 
            array (
                'id' => 391,
                'user_id' => 11,
                'photo_id' => 245,
                'body' => 'Amelia Earhart hätte dazu gesagt: "Gott ist der schweigende Partner bei allen großen Unternehmungen."',
                'created_at' => '2017-09-23 07:11:11',
                'updated_at' => '2017-09-23 07:11:11',
            ),
            391 => 
            array (
                'id' => 392,
                'user_id' => 11,
                'photo_id' => 277,
                'body' => 'Adolf Hitler hätte dazu gesagt: "Es wäre dumm, sich über die Außenwelt zu ärgern. Sie kümmert sich nicht darum."',
                'created_at' => '2017-09-04 01:31:21',
                'updated_at' => '2017-09-04 01:31:21',
            ),
            392 => 
            array (
                'id' => 393,
                'user_id' => 78,
                'photo_id' => 459,
                'body' => 'Sting hätte dazu gesagt: "Mit jedem Tag des Älterwerdens, befürchte ich genauso zu werden wie alle Menschen."',
                'created_at' => '2017-09-16 22:35:19',
                'updated_at' => '2017-09-16 22:35:19',
            ),
            393 => 
            array (
                'id' => 394,
                'user_id' => 171,
                'photo_id' => 38,
                'body' => 'Mary Magdalene hätte dazu gesagt: "Alkohol macht nicht nur viele Menschen unverträglich, er reduziert zum Glück auch die Anzahl der Unverträglichen."',
                'created_at' => '2017-08-25 08:18:14',
                'updated_at' => '2017-08-25 08:18:14',
            ),
            394 => 
            array (
                'id' => 395,
                'user_id' => 104,
                'photo_id' => 613,
                'body' => 'Alfred Hitchcock hätte dazu gesagt: "Ich will den Namen Gottes loben mit einem Lied."',
                'created_at' => '2017-09-14 23:09:37',
                'updated_at' => '2017-09-14 23:09:37',
            ),
            395 => 
            array (
                'id' => 396,
                'user_id' => 155,
                'photo_id' => 302,
                'body' => 'Michael Jackson hätte dazu gesagt: "Im Kriege verlieren alle, auch die Sieger."',
                'created_at' => '2017-09-09 12:52:07',
                'updated_at' => '2017-09-09 12:52:07',
            ),
            396 => 
            array (
                'id' => 397,
                'user_id' => 88,
                'photo_id' => 676,
                'body' => 'Madonna hätte dazu gesagt: "Zum Empfangen und Geben ist der Mensch geschaffen, zu Wirksamkeit und Freude, zum Tun und zum Leiden."',
                'created_at' => '2017-09-17 19:50:59',
                'updated_at' => '2017-09-17 19:50:59',
            ),
            397 => 
            array (
                'id' => 398,
                'user_id' => 89,
                'photo_id' => 358,
                'body' => 'Mata Hari hätte dazu gesagt: "Die Zeit ist ein großer Lehrer. Das Unglück: Sie tötet ihre Schüler."',
                'created_at' => '2017-09-04 04:50:56',
                'updated_at' => '2017-09-04 04:50:56',
            ),
            398 => 
            array (
                'id' => 399,
                'user_id' => 46,
                'photo_id' => 467,
                'body' => 'Cleopatra hätte dazu gesagt: "Vergangenes Leid muß Wohlsein fühlen lehren. Wer nie gedarbt, ist ohne Freude reich."',
                'created_at' => '2017-09-12 13:57:46',
                'updated_at' => '2017-09-12 13:57:46',
            ),
            399 => 
            array (
                'id' => 400,
                'user_id' => 85,
                'photo_id' => 433,
                'body' => 'Grace Kelly hätte dazu gesagt: "Die Natur ist ein Verschwender, der keine Kosten und Mühen scheut, um sein Werk in kürzester Zeit zu vollenden."',
                'created_at' => '2017-09-24 11:22:52',
                'updated_at' => '2017-09-24 11:22:52',
            ),
            400 => 
            array (
                'id' => 401,
                'user_id' => 99,
                'photo_id' => 91,
                'body' => 'Steve Jobs hätte dazu gesagt: "Gilt es zu hören, sei der Erste. Sei der Letzte, wenn es zu reden gilt."',
                'created_at' => '2017-09-20 06:53:33',
                'updated_at' => '2017-09-20 06:53:33',
            ),
            401 => 
            array (
                'id' => 402,
                'user_id' => 109,
                'photo_id' => 191,
                'body' => 'Ronald Reagan hätte dazu gesagt: "Der innere Friede hängt immer vom Menschen selbst ab: Der Mensch braucht zu seinem Glück im wahren Verstande nichts als ihn, und braucht, um ihn zu besitzen, nichts als sich."',
                'created_at' => '2017-08-27 20:33:59',
                'updated_at' => '2017-08-27 20:33:59',
            ),
            402 => 
            array (
                'id' => 403,
                'user_id' => 173,
                'photo_id' => 621,
                'body' => 'Lionel Messi hätte dazu gesagt: "Man kann nicht dem Arbeitnehmer helfen, indem man den Arbeitgeber beseitigt."',
                'created_at' => '2017-09-14 13:01:11',
                'updated_at' => '2017-09-14 13:01:11',
            ),
            403 => 
            array (
                'id' => 404,
                'user_id' => 170,
                'photo_id' => 231,
                'body' => 'Babe Ruth hätte dazu gesagt: "Wußten Sie schon, daß gerade ältere Herren junges Gemüse besonders schätzen?"',
                'created_at' => '2017-09-02 11:19:28',
                'updated_at' => '2017-09-02 11:19:28',
            ),
            404 => 
            array (
                'id' => 405,
                'user_id' => 22,
                'photo_id' => 29,
                'body' => 'Bob Geldof hätte dazu gesagt: "Jesus sagte: Steh auf, nimm deine Bahre und geh! Sofort wurde der Mann gesund, nahm seine Bahre und ging."',
                'created_at' => '2017-09-08 05:31:08',
                'updated_at' => '2017-09-08 05:31:08',
            ),
            405 => 
            array (
                'id' => 406,
                'user_id' => 169,
                'photo_id' => 23,
                'body' => 'Roger Federer hätte dazu gesagt: "Das Gefallen am Schönen und die Macht der Liebe sind etwas Natürliches, weder befohlen noch verboten, denn die Herzen stehen in Gottes Hand, und er wendet sie."',
                'created_at' => '2017-09-10 10:45:19',
                'updated_at' => '2017-09-10 10:45:19',
            ),
            406 => 
            array (
                'id' => 407,
                'user_id' => 124,
                'photo_id' => 504,
                'body' => 'Sigmund Freud hätte dazu gesagt: "Gut ist eine lange Wurst und eine kurze Predigt."',
                'created_at' => '2017-09-15 09:18:21',
                'updated_at' => '2017-09-15 09:18:21',
            ),
            407 => 
            array (
                'id' => 408,
                'user_id' => 78,
                'photo_id' => 60,
                'body' => 'Woodrow Wilson hätte dazu gesagt: "Wir sind nicht, wofür wir uns oft halten, doch wir sind viel mehr, als die meisten von uns ahnen."',
                'created_at' => '2017-09-15 00:30:28',
                'updated_at' => '2017-09-15 00:30:28',
            ),
            408 => 
            array (
                'id' => 409,
                'user_id' => 7,
                'photo_id' => 30,
                'body' => 'Mao Zedong hätte dazu gesagt: "Mäßige deinen Zorn; es fallen die Funken erst auf dich; auf den Feind, wenn sie je treffen, zuletzt."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            409 => 
            array (
                'id' => 410,
                'user_id' => 83,
                'photo_id' => 593,
                'body' => 'Katherine Hepburn hätte dazu gesagt: "Unter Umständen ist es für manches Kind am besten, wenn es gar nicht erzogen wird."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            410 => 
            array (
                'id' => 411,
                'user_id' => 133,
                'photo_id' => 582,
                'body' => 'Audrey Hepburn hätte dazu gesagt: "Nirgends zeigt sich der Mensch empfindlicher als in seinem Egoismus, und durch nichts ist er leichter zu besiegen als durch ihn."',
                'created_at' => '2017-09-06 19:06:32',
                'updated_at' => '2017-09-06 19:06:32',
            ),
            411 => 
            array (
                'id' => 412,
                'user_id' => 54,
                'photo_id' => 676,
                'body' => 'David Beckham hätte dazu gesagt: "Ein guter Nachbar ist besser als viele böse Verwandten."',
                'created_at' => '2017-09-02 22:52:13',
                'updated_at' => '2017-09-02 22:52:13',
            ),
            412 => 
            array (
                'id' => 413,
                'user_id' => 32,
                'photo_id' => 303,
                'body' => 'Usain Bolt hätte dazu gesagt: "Es regnet auf alle Dächer."',
                'created_at' => '2017-08-27 15:46:35',
                'updated_at' => '2017-08-27 15:46:35',
            ),
            413 => 
            array (
                'id' => 414,
                'user_id' => 134,
                'photo_id' => 92,
                'body' => 'Carl Lewis hätte dazu gesagt: "Was man heute politische Ansichten nennt, ist meist nur der Ausdruck wirtschaftlicher und sozialer Interessen."',
                'created_at' => '2017-09-12 06:10:23',
                'updated_at' => '2017-09-12 06:10:23',
            ),
            414 => 
            array (
                'id' => 415,
                'user_id' => 70,
                'photo_id' => 672,
                'body' => 'Prince Charles hätte dazu gesagt: "Und dann war da noch die Frustrierte, die sagte: "Ich habe nie bekommen, was ich wollte. Ich wollte, ich hätte das bekommen, was ich wollte. Aber nicht einmal das will ich."',
                'created_at' => '2017-09-07 11:15:32',
                'updated_at' => '2017-09-07 11:15:32',
            ),
            415 => 
            array (
                'id' => 416,
                'user_id' => 64,
                'photo_id' => 422,
                'body' => 'Jacqueline Kennedy Onassis hätte dazu gesagt: "In dem ehelichen Leben soll das vereinigte Paar gleichsam eine einzige moralische Person ausmachen, welche durch den Verstand des Mannes und den Geschmack der Frauen belebt und regiert wird."',
                'created_at' => '2017-09-18 12:59:50',
                'updated_at' => '2017-09-18 12:59:50',
            ),
            416 => 
            array (
                'id' => 417,
                'user_id' => 170,
                'photo_id' => 407,
                'body' => 'C.S. Lewis hätte dazu gesagt: "Nichts ist schwerer zu ertragen als Reißverschluß auf vollen Magen."',
                'created_at' => '2017-09-21 17:48:59',
                'updated_at' => '2017-09-21 17:48:59',
            ),
            417 => 
            array (
                'id' => 418,
                'user_id' => 10,
                'photo_id' => 596,
                'body' => 'Billie Holiday hätte dazu gesagt: "Das Gewissen ist der Puls der Vernunft."',
                'created_at' => '2017-09-09 03:53:15',
                'updated_at' => '2017-09-09 03:53:15',
            ),
            418 => 
            array (
                'id' => 419,
                'user_id' => 69,
                'photo_id' => 81,
                'body' => 'J.R.R. Tolkien hätte dazu gesagt: "Wer mit dem Kopf durch die Wand will, holt sich nur Beulen."',
                'created_at' => '2017-09-09 14:02:13',
                'updated_at' => '2017-09-09 14:02:13',
            ),
            419 => 
            array (
                'id' => 420,
                'user_id' => 31,
                'photo_id' => 31,
                'body' => 'Billie Jean King hätte dazu gesagt: "Nur ein Tor zertrümmert den Spiegel, wenn ihm das Spiegelbild mißfällt."',
                'created_at' => '2017-09-12 19:45:39',
                'updated_at' => '2017-09-12 19:45:39',
            ),
            420 => 
            array (
                'id' => 421,
                'user_id' => 5,
                'photo_id' => 235,
                'body' => 'Anne Frank hätte dazu gesagt: "Faulheit, Frauendienst, Kränklichkeit, zu große Anhänglichkeit an den Geburtsort, Genügsamkeit und Furchtsamkeit, diese sind sechs Hindernisse der Größe."',
                'created_at' => '2017-09-07 05:40:14',
                'updated_at' => '2017-09-07 05:40:14',
            ),
            421 => 
            array (
                'id' => 422,
                'user_id' => 46,
                'photo_id' => 362,
                'body' => 'Simon Bolivar hätte dazu gesagt: "Laß euch nicht mit falschen Göttern ein!"',
                'created_at' => '2017-09-09 14:09:17',
                'updated_at' => '2017-09-09 14:09:17',
            ),
            422 => 
            array (
                'id' => 423,
                'user_id' => 86,
                'photo_id' => 94,
                'body' => 'Marie Antoinette hätte dazu gesagt: "Wer sich entschieden hat, etwas zu tun, und an nichts anderes denkt, überwindet alle Hindernisse."',
                'created_at' => '2017-09-07 04:04:39',
                'updated_at' => '2017-09-07 04:04:39',
            ),
            423 => 
            array (
                'id' => 424,
                'user_id' => 167,
                'photo_id' => 455,
                'body' => 'Christiano Ronaldo hätte dazu gesagt: "Würden die Pforten der Wahrnehmung gereinigt, erschiene den Menschen alles, wie es ist: unendlich."',
                'created_at' => '2017-09-13 06:23:23',
                'updated_at' => '2017-09-13 06:23:23',
            ),
            424 => 
            array (
                'id' => 425,
                'user_id' => 120,
                'photo_id' => 573,
                'body' => 'Emmeline Pankhurst hätte dazu gesagt: "Es gibt nicht nur einen bunten Hund in der Welt."',
                'created_at' => '2017-09-03 18:51:07',
                'updated_at' => '2017-09-03 18:51:07',
            ),
            425 => 
            array (
                'id' => 426,
                'user_id' => 4,
                'photo_id' => 239,
                'body' => 'Emile Zatopek hätte dazu gesagt: "Als Sklaven und Herren ihrer Eigenliebe leben die Menschen dahin, nicht um zu leben, sondern um andere glauben zu machen, sie hätten gelebt."',
                'created_at' => '2017-09-05 22:19:58',
                'updated_at' => '2017-09-05 22:19:58',
            ),
            426 => 
            array (
                'id' => 427,
                'user_id' => 7,
                'photo_id' => 20,
                'body' => 'Lech Walesa hätte dazu gesagt: "Du lebst nicht für dich allein auf Erden."',
                'created_at' => '2017-09-21 17:27:19',
                'updated_at' => '2017-09-21 17:27:19',
            ),
            427 => 
            array (
                'id' => 428,
                'user_id' => 89,
                'photo_id' => 434,
                'body' => 'Marilyn Monroe hätte dazu gesagt: "Was ist der Mensch, daß du seiner gedenkst?"',
                'created_at' => '2017-08-27 00:44:23',
                'updated_at' => '2017-08-27 00:44:23',
            ),
            428 => 
            array (
                'id' => 429,
                'user_id' => 69,
                'photo_id' => 228,
                'body' => 'Abraham Lincoln hätte dazu gesagt: "Solange die Menschen sterben können und das Leben lieben, wird der Arzt verspottet und gut bezahlt werden."',
                'created_at' => '2017-09-14 08:59:15',
                'updated_at' => '2017-09-14 08:59:15',
            ),
            429 => 
            array (
                'id' => 430,
                'user_id' => 51,
                'photo_id' => 82,
                'body' => 'Mother Teresa hätte dazu gesagt: "Gastsein ist gut. Heimkommen ist besser."',
                'created_at' => '2017-09-08 06:51:08',
                'updated_at' => '2017-09-08 06:51:08',
            ),
            430 => 
            array (
                'id' => 431,
                'user_id' => 137,
                'photo_id' => 699,
                'body' => 'John F. Kennedy hätte dazu gesagt: "Wer die Vergangenheit preist, tadelt die Gegenwart."',
                'created_at' => '2017-08-29 13:53:59',
                'updated_at' => '2017-08-29 13:53:59',
            ),
            431 => 
            array (
                'id' => 432,
                'user_id' => 3,
                'photo_id' => 607,
                'body' => 'Martin Luther King hätte dazu gesagt: "Beten heißt, liebend an Jesus denken."',
                'created_at' => '2017-09-08 05:48:59',
                'updated_at' => '2017-09-08 05:48:59',
            ),
            432 => 
            array (
                'id' => 433,
                'user_id' => 36,
                'photo_id' => 391,
                'body' => 'Nelson Mandela hätte dazu gesagt: "Ich bin nicht entmutigt, weil jeder als falsch verworfene Versuch ein weiterer Schritt vorwärts ist."',
                'created_at' => '2017-09-23 07:11:12',
                'updated_at' => '2017-09-23 07:11:12',
            ),
            433 => 
            array (
                'id' => 434,
                'user_id' => 154,
                'photo_id' => 207,
                'body' => 'Winston Churchill hätte dazu gesagt: "Doppelt lebt, wer auch Vergangenes genießt."',
                'created_at' => '2017-09-04 01:31:22',
                'updated_at' => '2017-09-04 01:31:22',
            ),
            434 => 
            array (
                'id' => 435,
                'user_id' => 137,
                'photo_id' => 322,
                'body' => 'Bill Gates hätte dazu gesagt: "Der Busch hat Augen, der Baumstumpf trägt einen Hut."',
                'created_at' => '2017-09-16 22:35:20',
                'updated_at' => '2017-09-16 22:35:20',
            ),
            435 => 
            array (
                'id' => 436,
                'user_id' => 103,
                'photo_id' => 435,
                'body' => 'Muhammad Ali hätte dazu gesagt: "Die Nacht ist die Mutter von Gedanken."',
                'created_at' => '2017-08-25 08:18:15',
                'updated_at' => '2017-08-25 08:18:15',
            ),
            436 => 
            array (
                'id' => 437,
                'user_id' => 36,
                'photo_id' => 682,
                'body' => 'Mahatma Gandhi hätte dazu gesagt: "Das Leben ist eine große Gelegenheit, und es ist sehr schade, wenn der Mensch das erst zu spät erkennt."',
                'created_at' => '2017-09-14 23:09:38',
                'updated_at' => '2017-09-14 23:09:38',
            ),
            437 => 
            array (
                'id' => 438,
                'user_id' => 88,
                'photo_id' => 535,
                'body' => 'Margaret Thatcher hätte dazu gesagt: "Herr, ich rufe zu dir. Eile mir zur Hilfe; höre auf meine Stimme, wenn ich zu dir rufe."',
                'created_at' => '2017-09-09 12:52:08',
                'updated_at' => '2017-09-09 12:52:08',
            ),
            438 => 
            array (
                'id' => 439,
                'user_id' => 70,
                'photo_id' => 244,
                'body' => 'Charles de Gaulle hätte dazu gesagt: "Seit zehn Jahren versuchen viele Ostdeutsche möglichst schnell Wessis zu werden. Natürlich ohne ihre Identität dabei aufzugeben. Hundertprozentig ist das jedoch nur ganz wenigen gelungen. Aber immerhin gibt es inzwisc',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            439 => 
            array (
                'id' => 440,
                'user_id' => 101,
                'photo_id' => 140,
                'body' => 'Christopher Columbus hätte dazu gesagt: "Verlaßt euch nicht auf Gewalt!"',
                'created_at' => '2017-09-04 04:50:57',
                'updated_at' => '2017-09-04 04:50:57',
            ),
            440 => 
            array (
                'id' => 441,
                'user_id' => 149,
                'photo_id' => 485,
                'body' => 'George Orwell hätte dazu gesagt: "Ermuntert einander mit Psalmen und Lobgesängen und geistlichen Liedern, singt und spielt dem Herrn in euren Herzen."',
                'created_at' => '2017-09-12 13:57:47',
                'updated_at' => '2017-09-12 13:57:47',
            ),
            441 => 
            array (
                'id' => 442,
                'user_id' => 162,
                'photo_id' => 472,
                'body' => 'Charles Darwin hätte dazu gesagt: "Das einzige Mittel, den Irrtum zu vermeiden, ist die Unwissenheit."',
                'created_at' => '2017-09-24 11:22:53',
                'updated_at' => '2017-09-24 11:22:53',
            ),
            442 => 
            array (
                'id' => 443,
                'user_id' => 59,
                'photo_id' => 41,
                'body' => 'Elvis Presley hätte dazu gesagt: "Willst du fremde Fehler zählen, heb an deinen an zu zählen. Ist mir recht, wird dir die Weile zu den fremden Fehlern fehlen."',
                'created_at' => '2017-09-20 06:53:34',
                'updated_at' => '2017-09-20 06:53:34',
            ),
            443 => 
            array (
                'id' => 444,
                'user_id' => 20,
                'photo_id' => 115,
                'body' => 'Albert Einstein hätte dazu gesagt: "Trau niemals einem Menschen, der sich die Haare färbt. Er färbt auch seine Gefühle."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            444 => 
            array (
                'id' => 445,
                'user_id' => 89,
                'photo_id' => 61,
                'body' => 'Paul McCartney hätte dazu gesagt: "Treibt uns der Ehrgeiz zur Einsamkeit? Die Antwort muß lauten: Ja! Denn was ist ihm mehr zuwider als Gemeinsamkeit? Was ist ihm wichtiger als Bewegungsfreiheit?"',
                'created_at' => '2017-09-14 13:01:12',
                'updated_at' => '2017-09-14 13:01:12',
            ),
            445 => 
            array (
                'id' => 446,
                'user_id' => 178,
                'photo_id' => 236,
                'body' => 'Plato hätte dazu gesagt: "Was ein Leben an Länge gewinnt, verliert es meist an Tiefe."',
                'created_at' => '2017-09-02 11:19:29',
                'updated_at' => '2017-09-02 11:19:29',
            ),
            446 => 
            array (
                'id' => 447,
                'user_id' => 73,
                'photo_id' => 658,
                'body' => 'Queen Elizabeth hätte dazu gesagt: "Die Vergangenheit und die Erinnerung haben eine unendliche Kraft, und wenn auch schmerzliche Sehnsucht daraus quillt, sich ihnen hinzugeben, so liegt darin doch ein unaussprechlich süßer Genuß."',
                'created_at' => '2017-09-08 05:31:09',
                'updated_at' => '2017-09-08 05:31:09',
            ),
            447 => 
            array (
                'id' => 448,
                'user_id' => 2,
                'photo_id' => 593,
                'body' => 'Queen Victoria hätte dazu gesagt: "Im Wald lehnt sich Baum an Baum, also warum nicht Mensch an Mensch?"',
                'created_at' => '2017-09-10 10:45:20',
                'updated_at' => '2017-09-10 10:45:20',
            ),
            448 => 
            array (
                'id' => 449,
                'user_id' => 54,
                'photo_id' => 77,
                'body' => 'John M Keynes hätte dazu gesagt: "Nur der, der gar nichts tut, macht einen Fehler."',
                'created_at' => '2017-09-15 09:18:22',
                'updated_at' => '2017-09-15 09:18:22',
            ),
            449 => 
            array (
                'id' => 450,
                'user_id' => 43,
                'photo_id' => 236,
                'body' => 'Mikhail Gorbachev hätte dazu gesagt: "Wer sich getroffen fühlt, ist gemeint."',
                'created_at' => '2017-09-15 00:30:29',
                'updated_at' => '2017-09-15 00:30:29',
            ),
            450 => 
            array (
                'id' => 451,
                'user_id' => 175,
                'photo_id' => 617,
                'body' => 'Jawaharlal Nehru hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            451 => 
            array (
                'id' => 452,
                'user_id' => 186,
                'photo_id' => 183,
                'body' => 'Leonardo da Vinci hätte dazu gesagt: "Bin, der mich sagen hört, »umsonst« – heißt »gratis«, doch auch »vergeblich« –, Gnade wie Nichtigkeit gleichermaßen."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            452 => 
            array (
                'id' => 453,
                'user_id' => 163,
                'photo_id' => 88,
                'body' => 'Louis Pasteur hätte dazu gesagt: "Sein Leid in sich fressen."',
                'created_at' => '2017-09-06 19:06:33',
                'updated_at' => '2017-09-06 19:06:33',
            ),
            453 => 
            array (
                'id' => 454,
                'user_id' => 15,
                'photo_id' => 377,
                'body' => 'Leo Tolstoy hätte dazu gesagt: "Solang ein Weib liebt, liebt es in einem fort – ein Mann hat dazwischen zu tun."',
                'created_at' => '2017-09-02 22:52:14',
                'updated_at' => '2017-09-02 22:52:14',
            ),
            454 => 
            array (
                'id' => 455,
                'user_id' => 114,
                'photo_id' => 427,
                'body' => 'Pablo Picasso hätte dazu gesagt: "Mit Fristgeben gedeiht der Handel."',
                'created_at' => '2017-08-27 15:46:36',
                'updated_at' => '2017-08-27 15:46:36',
            ),
            455 => 
            array (
                'id' => 456,
                'user_id' => 148,
                'photo_id' => 633,
                'body' => 'Vincent Van Gogh hätte dazu gesagt: "Flausen im Kopf sorgen für die Federung des Denkapparates."',
                'created_at' => '2017-09-12 06:10:24',
                'updated_at' => '2017-09-12 06:10:24',
            ),
            456 => 
            array (
                'id' => 457,
                'user_id' => 38,
                'photo_id' => 514,
                'body' => 'Franklin D. Roosevelt hätte dazu gesagt: "Wer sich nicht schämt, etwas nicht zu können, und sich nicht ärgert, etwas nicht zu können, der kommt voran."',
                'created_at' => '2017-09-07 11:15:33',
                'updated_at' => '2017-09-07 11:15:33',
            ),
            457 => 
            array (
                'id' => 458,
                'user_id' => 193,
                'photo_id' => 197,
                'body' => 'Pope John Paul II hätte dazu gesagt: "Werden die Eisheiligen im Hundertjährigen Eskimo-Kalender als heiße Jungs aufgeführt?"',
                'created_at' => '2017-09-18 12:59:51',
                'updated_at' => '2017-09-18 12:59:51',
            ),
            458 => 
            array (
                'id' => 459,
                'user_id' => 74,
                'photo_id' => 12,
                'body' => 'Thomas Edison hätte dazu gesagt: "Viele verabschieden sich von dieser Welt, ohne jemals etwas gesagt zu haben."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            459 => 
            array (
                'id' => 460,
                'user_id' => 89,
                'photo_id' => 372,
                'body' => 'Rosa Parks hätte dazu gesagt: "Es ist weise, das Glück wahrzunehmen, das unser Herrgott einem zuschickt."',
                'created_at' => '2017-09-09 03:53:16',
                'updated_at' => '2017-09-09 03:53:16',
            ),
            460 => 
            array (
                'id' => 461,
                'user_id' => 91,
                'photo_id' => 458,
                'body' => 'Aung San Suu Kyi hätte dazu gesagt: "Rache ist teuer."',
                'created_at' => '2017-09-09 14:02:14',
                'updated_at' => '2017-09-09 14:02:14',
            ),
            461 => 
            array (
                'id' => 462,
                'user_id' => 178,
                'photo_id' => 203,
                'body' => 'Lyndon Johnson hätte dazu gesagt: "Die Macht ist bei den Fröhlichen."',
                'created_at' => '2017-09-12 19:45:40',
                'updated_at' => '2017-09-12 19:45:40',
            ),
            462 => 
            array (
                'id' => 463,
                'user_id' => 36,
                'photo_id' => 369,
                'body' => 'Ludwig Beethoven hätte dazu gesagt: "Wenn du ein Geheimnis nicht bewahren willst, dann sag es einer Frau."',
                'created_at' => '2017-09-07 05:40:15',
                'updated_at' => '2017-09-07 05:40:15',
            ),
            463 => 
            array (
                'id' => 464,
                'user_id' => 127,
                'photo_id' => 325,
                'body' => 'Oprah Winfrey hätte dazu gesagt: "Wenn man nichts hat, was man liebt, muß man lieben, was man hat."',
                'created_at' => '2017-09-09 14:09:18',
                'updated_at' => '2017-09-09 14:09:18',
            ),
            464 => 
            array (
                'id' => 465,
                'user_id' => 87,
                'photo_id' => 8,
                'body' => 'Indira Gandhi hätte dazu gesagt: "Ein guter Anfang ist ein halber Erfolg."',
                'created_at' => '2017-09-07 04:04:40',
                'updated_at' => '2017-09-07 04:04:40',
            ),
            465 => 
            array (
                'id' => 466,
                'user_id' => 134,
                'photo_id' => 236,
                'body' => 'Eva Peron hätte dazu gesagt: "Popularität hat für mich immer etwas Unbehagliches."',
                'created_at' => '2017-09-13 06:23:24',
                'updated_at' => '2017-09-13 06:23:24',
            ),
            466 => 
            array (
                'id' => 467,
                'user_id' => 12,
                'photo_id' => 660,
                'body' => 'Benazir Bhutto hätte dazu gesagt: "Die Ehre ist die Poesie der Pflicht!"',
                'created_at' => '2017-09-03 18:51:08',
                'updated_at' => '2017-09-03 18:51:08',
            ),
            467 => 
            array (
                'id' => 468,
                'user_id' => 61,
                'photo_id' => 398,
                'body' => 'Desmond Tutu hätte dazu gesagt: "Ein Mensch ohne Geld ist wie ein Wolf ohne Zähne."',
                'created_at' => '2017-09-05 22:19:59',
                'updated_at' => '2017-09-05 22:19:59',
            ),
            468 => 
            array (
                'id' => 469,
                'user_id' => 57,
                'photo_id' => 613,
                'body' => 'Dalai Lama hätte dazu gesagt: "Es ist irrelevant, wie lange sich die Dummköpfe unter dem Baum der Weisheit und Barmherzigkeit aufhalten. Für sie wird kein einziger Apfel herunter fallen."',
                'created_at' => '2017-09-21 17:27:20',
                'updated_at' => '2017-09-21 17:27:20',
            ),
            469 => 
            array (
                'id' => 470,
                'user_id' => 178,
                'photo_id' => 39,
                'body' => 'Walt Disney hätte dazu gesagt: "Christus und Moses, alle Seher und Magier waren "in der Ruhe". Martha arbeitete sich ab - Maria baute sich auf. Darum sagte Christus von Maria, sie habe das bessere Teil erwählt, da sie sich nicht zur Hausmagd erniedrigte g',
                'created_at' => '2017-08-27 00:44:24',
                'updated_at' => '2017-08-27 00:44:24',
            ),
            470 => 
            array (
                'id' => 471,
                'user_id' => 41,
                'photo_id' => 658,
                'body' => 'Peter Sellers hätte dazu gesagt: "Wo du zu tadeln hast, komm und hilf!"',
                'created_at' => '2017-09-14 08:59:16',
                'updated_at' => '2017-09-14 08:59:16',
            ),
            471 => 
            array (
                'id' => 472,
                'user_id' => 168,
                'photo_id' => 246,
                'body' => 'Barack Obama hätte dazu gesagt: "Lebendig ist das Wort Gottes, kraftvoll und schärfer als jedes zweischneidige Schwert."',
                'created_at' => '2017-09-08 06:51:09',
                'updated_at' => '2017-09-08 06:51:09',
            ),
            472 => 
            array (
                'id' => 473,
                'user_id' => 179,
                'photo_id' => 627,
                'body' => 'Malcolm X hätte dazu gesagt: "Wer niemals außer sich gerät, wird niemals in sich gehen."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            473 => 
            array (
                'id' => 474,
                'user_id' => 140,
                'photo_id' => 496,
                'body' => 'J.K.Rowling hätte dazu gesagt: "Wer nicht läuft, gelangt nie ans Ziel!"',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            474 => 
            array (
                'id' => 475,
                'user_id' => 170,
                'photo_id' => 493,
                'body' => 'Richard Branson hätte dazu gesagt: "Machen Sie es sich zur Aufgabe, höheren Ansprüchen zu genügen, als andere an Sie stellen."',
                'created_at' => '2017-09-23 07:11:13',
                'updated_at' => '2017-09-23 07:11:13',
            ),
            475 => 
            array (
                'id' => 476,
                'user_id' => 18,
                'photo_id' => 625,
                'body' => 'Pele hätte dazu gesagt: "Laß die anderen in Ruhe, sorge für dich selbst."',
                'created_at' => '2017-09-04 01:31:23',
                'updated_at' => '2017-09-04 01:31:23',
            ),
            476 => 
            array (
                'id' => 477,
                'user_id' => 25,
                'photo_id' => 317,
                'body' => 'Erster Blogeintrag hätte dazu gesagt: "Ich bin so aufgeregt."',
                'created_at' => '2017-09-16 22:35:21',
                'updated_at' => '2017-09-16 22:35:21',
            ),
            477 => 
            array (
                'id' => 478,
                'user_id' => 129,
                'photo_id' => 318,
                'body' => 'Marilyn Monroe hätte dazu gesagt: "Wo will man aber Weisheit finden, und wo ist die Stätte der Einsicht?"',
                'created_at' => '2017-08-25 08:18:16',
                'updated_at' => '2017-08-25 08:18:16',
            ),
            478 => 
            array (
                'id' => 479,
                'user_id' => 27,
                'photo_id' => 443,
                'body' => 'Abraham Lincoln hätte dazu gesagt: "Bevor du sprichst, denke siebenmal darüber nach!"',
                'created_at' => '2017-09-14 23:09:39',
                'updated_at' => '2017-09-14 23:09:39',
            ),
            479 => 
            array (
                'id' => 480,
                'user_id' => 64,
                'photo_id' => 565,
                'body' => 'Mother Teresa hätte dazu gesagt: "Nichts ist einem Menschen willkommener als ein Freund zur rechten Zeit."',
                'created_at' => '2017-09-09 12:52:09',
                'updated_at' => '2017-09-09 12:52:09',
            ),
            480 => 
            array (
                'id' => 481,
                'user_id' => 56,
                'photo_id' => 569,
                'body' => 'John F. Kennedy hätte dazu gesagt: "Das Alter ist eine Reisende der Nacht. die Erde verbirgt sich und der Himmel wird sichtbar."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            481 => 
            array (
                'id' => 482,
                'user_id' => 90,
                'photo_id' => 590,
                'body' => 'Martin Luther King hätte dazu gesagt: "Wer den anderen liebt, hat das Gesetz erfüllt."',
                'created_at' => '2017-09-04 04:50:58',
                'updated_at' => '2017-09-04 04:50:58',
            ),
            482 => 
            array (
                'id' => 483,
                'user_id' => 149,
                'photo_id' => 237,
                'body' => 'Nelson Mandela hätte dazu gesagt: "Offene Hände schenken mehr als saubere Finger."',
                'created_at' => '2017-09-12 13:57:48',
                'updated_at' => '2017-09-12 13:57:48',
            ),
            483 => 
            array (
                'id' => 484,
                'user_id' => 167,
                'photo_id' => 499,
                'body' => 'Winston Churchill hätte dazu gesagt: "Wer heile Hände hat, dem tut das Gift nichts an; Das Böse schadet nicht dem, der es nicht getan."',
                'created_at' => '2017-09-24 11:22:54',
                'updated_at' => '2017-09-24 11:22:54',
            ),
            484 => 
            array (
                'id' => 485,
                'user_id' => 19,
                'photo_id' => 38,
                'body' => 'Bill Gates hätte dazu gesagt: "Kummer verdaut man am besten, wenn man ihn in Wein auflöst."',
                'created_at' => '2017-09-20 06:53:35',
                'updated_at' => '2017-09-20 06:53:35',
            ),
            485 => 
            array (
                'id' => 486,
                'user_id' => 11,
                'photo_id' => 154,
                'body' => 'Muhammad Ali hätte dazu gesagt: "Die Kunst der Weisheit besteht darin, zu wissen, was man übersehen muß."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            486 => 
            array (
                'id' => 487,
                'user_id' => 158,
                'photo_id' => 393,
                'body' => 'Mahatma Gandhi hätte dazu gesagt: "Grenzen der Technik: Ein Tauchsieder kocht auch nur mit Wasser."',
                'created_at' => '2017-09-14 13:01:13',
                'updated_at' => '2017-09-14 13:01:13',
            ),
            487 => 
            array (
                'id' => 488,
                'user_id' => 68,
                'photo_id' => 283,
                'body' => 'Margaret Thatcher hätte dazu gesagt: "Ein Haus wird gebaut, aber ein Zuhause wird geformt."',
                'created_at' => '2017-09-02 11:19:30',
                'updated_at' => '2017-09-02 11:19:30',
            ),
            488 => 
            array (
                'id' => 489,
                'user_id' => 64,
                'photo_id' => 377,
                'body' => 'Charles de Gaulle hätte dazu gesagt: "Bemerke, höre, schweige. Urteile wenig, frage viel."',
                'created_at' => '2017-09-08 05:31:10',
                'updated_at' => '2017-09-08 05:31:10',
            ),
            489 => 
            array (
                'id' => 490,
                'user_id' => 107,
                'photo_id' => 83,
                'body' => 'Christopher Columbus hätte dazu gesagt: "Es ist eine viel schlimmere Art des Stolzes, andere zu verkleinern, als sich selbst zu erheben."',
                'created_at' => '2017-09-10 10:45:21',
                'updated_at' => '2017-09-10 10:45:21',
            ),
            490 => 
            array (
                'id' => 491,
                'user_id' => 29,
                'photo_id' => 347,
                'body' => 'George Orwell hätte dazu gesagt: "In den Bau der Welt taugt nur der abgeschliffene Stein."',
                'created_at' => '2017-09-15 09:18:23',
                'updated_at' => '2017-09-15 09:18:23',
            ),
            491 => 
            array (
                'id' => 492,
                'user_id' => 1,
                'photo_id' => 478,
                'body' => 'Charles Darwin hätte dazu gesagt: "Doch schmecken muß man alles, heiß und kalt, wer jung kein Narr war, wird es, wenn er alt."',
                'created_at' => '2017-09-15 00:30:30',
                'updated_at' => '2017-09-15 00:30:30',
            ),
            492 => 
            array (
                'id' => 493,
                'user_id' => 102,
                'photo_id' => 67,
                'body' => 'Elvis Presley hätte dazu gesagt: "Gott ist der schweigende Partner bei allen großen Unternehmungen."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            493 => 
            array (
                'id' => 494,
                'user_id' => 54,
                'photo_id' => 511,
                'body' => 'Albert Einstein hätte dazu gesagt: "Es wäre dumm, sich über die Außenwelt zu ärgern. Sie kümmert sich nicht darum."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            494 => 
            array (
                'id' => 495,
                'user_id' => 62,
                'photo_id' => 236,
                'body' => 'Paul McCartney hätte dazu gesagt: "Mit jedem Tag des Älterwerdens, befürchte ich genauso zu werden wie alle Menschen."',
                'created_at' => '2017-09-06 19:06:34',
                'updated_at' => '2017-09-06 19:06:34',
            ),
            495 => 
            array (
                'id' => 496,
                'user_id' => 7,
                'photo_id' => 287,
                'body' => 'Plato hätte dazu gesagt: "Alkohol macht nicht nur viele Menschen unverträglich, er reduziert zum Glück auch die Anzahl der Unverträglichen."',
                'created_at' => '2017-09-02 22:52:15',
                'updated_at' => '2017-09-02 22:52:15',
            ),
            496 => 
            array (
                'id' => 497,
                'user_id' => 62,
                'photo_id' => 14,
                'body' => 'Queen Elizabeth hätte dazu gesagt: "Ich will den Namen Gottes loben mit einem Lied."',
                'created_at' => '2017-08-27 15:46:37',
                'updated_at' => '2017-08-27 15:46:37',
            ),
            497 => 
            array (
                'id' => 498,
                'user_id' => 42,
                'photo_id' => 335,
                'body' => 'Queen Victoria hätte dazu gesagt: "Im Kriege verlieren alle, auch die Sieger."',
                'created_at' => '2017-09-12 06:10:25',
                'updated_at' => '2017-09-12 06:10:25',
            ),
            498 => 
            array (
                'id' => 499,
                'user_id' => 110,
                'photo_id' => 642,
                'body' => 'John M Keynes hätte dazu gesagt: "Zum Empfangen und Geben ist der Mensch geschaffen, zu Wirksamkeit und Freude, zum Tun und zum Leiden."',
                'created_at' => '2017-09-07 11:15:34',
                'updated_at' => '2017-09-07 11:15:34',
            ),
            499 => 
            array (
                'id' => 500,
                'user_id' => 109,
                'photo_id' => 313,
                'body' => 'Mikhail Gorbachev hätte dazu gesagt: "Die Zeit ist ein großer Lehrer. Das Unglück: Sie tötet ihre Schüler."',
                'created_at' => '2017-09-18 12:59:52',
                'updated_at' => '2017-09-18 12:59:52',
            ),
        ));
        \DB::table('comments')->insert(array (
            0 => 
            array (
                'id' => 501,
                'user_id' => 31,
                'photo_id' => 304,
                'body' => 'Jawaharlal Nehru hätte dazu gesagt: "Vergangenes Leid muß Wohlsein fühlen lehren. Wer nie gedarbt, ist ohne Freude reich."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            1 => 
            array (
                'id' => 502,
                'user_id' => 130,
                'photo_id' => 687,
                'body' => 'Leonardo da Vinci hätte dazu gesagt: "Die Natur ist ein Verschwender, der keine Kosten und Mühen scheut, um sein Werk in kürzester Zeit zu vollenden."',
                'created_at' => '2017-09-09 03:53:17',
                'updated_at' => '2017-09-09 03:53:17',
            ),
            2 => 
            array (
                'id' => 503,
                'user_id' => 90,
                'photo_id' => 8,
                'body' => 'Louis Pasteur hätte dazu gesagt: "Gilt es zu hören, sei der Erste. Sei der Letzte, wenn es zu reden gilt."',
                'created_at' => '2017-09-09 14:02:15',
                'updated_at' => '2017-09-09 14:02:15',
            ),
            3 => 
            array (
                'id' => 504,
                'user_id' => 45,
                'photo_id' => 610,
                'body' => 'Leo Tolstoy hätte dazu gesagt: "Der innere Friede hängt immer vom Menschen selbst ab: Der Mensch braucht zu seinem Glück im wahren Verstande nichts als ihn, und braucht, um ihn zu besitzen, nichts als sich."',
                'created_at' => '2017-09-12 19:45:41',
                'updated_at' => '2017-09-12 19:45:41',
            ),
            4 => 
            array (
                'id' => 505,
                'user_id' => 183,
                'photo_id' => 100,
                'body' => 'Pablo Picasso hätte dazu gesagt: "Man kann nicht dem Arbeitnehmer helfen, indem man den Arbeitgeber beseitigt."',
                'created_at' => '2017-09-07 05:40:16',
                'updated_at' => '2017-09-07 05:40:16',
            ),
            5 => 
            array (
                'id' => 506,
                'user_id' => 44,
                'photo_id' => 551,
                'body' => 'Vincent Van Gogh hätte dazu gesagt: "Wußten Sie schon, daß gerade ältere Herren junges Gemüse besonders schätzen?"',
                'created_at' => '2017-09-09 14:09:19',
                'updated_at' => '2017-09-09 14:09:19',
            ),
            6 => 
            array (
                'id' => 507,
                'user_id' => 77,
                'photo_id' => 356,
                'body' => 'Franklin D. Roosevelt hätte dazu gesagt: "Jesus sagte: Steh auf, nimm deine Bahre und geh! Sofort wurde der Mann gesund, nahm seine Bahre und ging."',
                'created_at' => '2017-09-07 04:04:41',
                'updated_at' => '2017-09-07 04:04:41',
            ),
            7 => 
            array (
                'id' => 508,
                'user_id' => 143,
                'photo_id' => 667,
                'body' => 'Pope John Paul II hätte dazu gesagt: "Das Gefallen am Schönen und die Macht der Liebe sind etwas Natürliches, weder befohlen noch verboten, denn die Herzen stehen in Gottes Hand, und er wendet sie."',
                'created_at' => '2017-09-13 06:23:25',
                'updated_at' => '2017-09-13 06:23:25',
            ),
            8 => 
            array (
                'id' => 509,
                'user_id' => 159,
                'photo_id' => 473,
                'body' => 'Thomas Edison hätte dazu gesagt: "Gut ist eine lange Wurst und eine kurze Predigt."',
                'created_at' => '2017-09-03 18:51:09',
                'updated_at' => '2017-09-03 18:51:09',
            ),
            9 => 
            array (
                'id' => 510,
                'user_id' => 107,
                'photo_id' => 95,
                'body' => 'Rosa Parks hätte dazu gesagt: "Wir sind nicht, wofür wir uns oft halten, doch wir sind viel mehr, als die meisten von uns ahnen."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            10 => 
            array (
                'id' => 511,
                'user_id' => 71,
                'photo_id' => 501,
                'body' => 'Aung San Suu Kyi hätte dazu gesagt: "Mäßige deinen Zorn; es fallen die Funken erst auf dich; auf den Feind, wenn sie je treffen, zuletzt."',
                'created_at' => '2017-09-21 17:27:21',
                'updated_at' => '2017-09-21 17:27:21',
            ),
            11 => 
            array (
                'id' => 512,
                'user_id' => 126,
                'photo_id' => 247,
                'body' => 'Lyndon Johnson hätte dazu gesagt: "Unter Umständen ist es für manches Kind am besten, wenn es gar nicht erzogen wird."',
                'created_at' => '2017-08-27 00:44:25',
                'updated_at' => '2017-08-27 00:44:25',
            ),
            12 => 
            array (
                'id' => 513,
                'user_id' => 177,
                'photo_id' => 434,
                'body' => 'Ludwig Beethoven hätte dazu gesagt: "Nirgends zeigt sich der Mensch empfindlicher als in seinem Egoismus, und durch nichts ist er leichter zu besiegen als durch ihn."',
                'created_at' => '2017-09-14 08:59:17',
                'updated_at' => '2017-09-14 08:59:17',
            ),
            13 => 
            array (
                'id' => 514,
                'user_id' => 105,
                'photo_id' => 417,
                'body' => 'Oprah Winfrey hätte dazu gesagt: "Ein guter Nachbar ist besser als viele böse Verwandten."',
                'created_at' => '2017-09-08 06:51:10',
                'updated_at' => '2017-09-08 06:51:10',
            ),
            14 => 
            array (
                'id' => 515,
                'user_id' => 23,
                'photo_id' => 197,
                'body' => 'Indira Gandhi hätte dazu gesagt: "Es regnet auf alle Dächer."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            15 => 
            array (
                'id' => 516,
                'user_id' => 138,
                'photo_id' => 616,
                'body' => 'Eva Peron hätte dazu gesagt: "Was man heute politische Ansichten nennt, ist meist nur der Ausdruck wirtschaftlicher und sozialer Interessen."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            16 => 
            array (
                'id' => 517,
                'user_id' => 23,
                'photo_id' => 397,
                'body' => 'Benazir Bhutto hätte dazu gesagt: "Und dann war da noch die Frustrierte, die sagte: "Ich habe nie bekommen, was ich wollte. Ich wollte, ich hätte das bekommen, was ich wollte. Aber nicht einmal das will ich."',
                'created_at' => '2017-09-23 07:11:14',
                'updated_at' => '2017-09-23 07:11:14',
            ),
            17 => 
            array (
                'id' => 518,
                'user_id' => 194,
                'photo_id' => 426,
                'body' => 'Desmond Tutu hätte dazu gesagt: "In dem ehelichen Leben soll das vereinigte Paar gleichsam eine einzige moralische Person ausmachen, welche durch den Verstand des Mannes und den Geschmack der Frauen belebt und regiert wird."',
                'created_at' => '2017-09-04 01:31:24',
                'updated_at' => '2017-09-04 01:31:24',
            ),
            18 => 
            array (
                'id' => 519,
                'user_id' => 89,
                'photo_id' => 559,
                'body' => 'Dalai Lama hätte dazu gesagt: "Nichts ist schwerer zu ertragen als Reißverschluß auf vollen Magen."',
                'created_at' => '2017-09-16 22:35:22',
                'updated_at' => '2017-09-16 22:35:22',
            ),
            19 => 
            array (
                'id' => 520,
                'user_id' => 25,
                'photo_id' => 414,
                'body' => 'Walt Disney hätte dazu gesagt: "Das Gewissen ist der Puls der Vernunft."',
                'created_at' => '2017-08-25 08:18:17',
                'updated_at' => '2017-08-25 08:18:17',
            ),
            20 => 
            array (
                'id' => 521,
                'user_id' => 192,
                'photo_id' => 83,
                'body' => 'Peter Sellers hätte dazu gesagt: "Wer mit dem Kopf durch die Wand will, holt sich nur Beulen."',
                'created_at' => '2017-09-14 23:09:40',
                'updated_at' => '2017-09-14 23:09:40',
            ),
            21 => 
            array (
                'id' => 522,
                'user_id' => 133,
                'photo_id' => 93,
                'body' => 'Barack Obama hätte dazu gesagt: "Nur ein Tor zertrümmert den Spiegel, wenn ihm das Spiegelbild mißfällt."',
                'created_at' => '2017-09-09 12:52:10',
                'updated_at' => '2017-09-09 12:52:10',
            ),
            22 => 
            array (
                'id' => 523,
                'user_id' => 50,
                'photo_id' => 340,
                'body' => 'Malcolm X hätte dazu gesagt: "Faulheit, Frauendienst, Kränklichkeit, zu große Anhänglichkeit an den Geburtsort, Genügsamkeit und Furchtsamkeit, diese sind sechs Hindernisse der Größe."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            23 => 
            array (
                'id' => 524,
                'user_id' => 62,
                'photo_id' => 278,
                'body' => 'J.K.Rowling hätte dazu gesagt: "Laß euch nicht mit falschen Göttern ein!"',
                'created_at' => '2017-09-04 04:50:59',
                'updated_at' => '2017-09-04 04:50:59',
            ),
            24 => 
            array (
                'id' => 525,
                'user_id' => 25,
                'photo_id' => 526,
                'body' => 'Richard Branson hätte dazu gesagt: "Wer sich entschieden hat, etwas zu tun, und an nichts anderes denkt, überwindet alle Hindernisse."',
                'created_at' => '2017-09-12 13:57:49',
                'updated_at' => '2017-09-12 13:57:49',
            ),
            25 => 
            array (
                'id' => 526,
                'user_id' => 20,
                'photo_id' => 516,
                'body' => 'Pele hätte dazu gesagt: "Würden die Pforten der Wahrnehmung gereinigt, erschiene den Menschen alles, wie es ist: unendlich."',
                'created_at' => '2017-09-24 11:22:55',
                'updated_at' => '2017-09-24 11:22:55',
            ),
            26 => 
            array (
                'id' => 527,
                'user_id' => 157,
                'photo_id' => 431,
                'body' => 'Angelina Jolie hätte dazu gesagt: "Es gibt nicht nur einen bunten Hund in der Welt."',
                'created_at' => '2017-09-20 06:53:36',
                'updated_at' => '2017-09-20 06:53:36',
            ),
            27 => 
            array (
                'id' => 528,
                'user_id' => 158,
                'photo_id' => 360,
                'body' => 'Jesse Owens hätte dazu gesagt: "Als Sklaven und Herren ihrer Eigenliebe leben die Menschen dahin, nicht um zu leben, sondern um andere glauben zu machen, sie hätten gelebt."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            28 => 
            array (
                'id' => 529,
                'user_id' => 140,
                'photo_id' => 369,
                'body' => 'Ernest Hemingway hätte dazu gesagt: "Du lebst nicht für dich allein auf Erden."',
                'created_at' => '2017-09-14 13:01:14',
                'updated_at' => '2017-09-14 13:01:14',
            ),
            29 => 
            array (
                'id' => 530,
                'user_id' => 54,
                'photo_id' => 197,
                'body' => 'John Lennon hätte dazu gesagt: "Was ist der Mensch, daß du seiner gedenkst?"',
                'created_at' => '2017-09-02 11:19:31',
                'updated_at' => '2017-09-02 11:19:31',
            ),
            30 => 
            array (
                'id' => 531,
                'user_id' => 126,
                'photo_id' => 689,
                'body' => 'Henry Ford hätte dazu gesagt: "Solange die Menschen sterben können und das Leben lieben, wird der Arzt verspottet und gut bezahlt werden."',
                'created_at' => '2017-09-08 05:31:11',
                'updated_at' => '2017-09-08 05:31:11',
            ),
            31 => 
            array (
                'id' => 532,
                'user_id' => 65,
                'photo_id' => 463,
                'body' => 'Haile Selassie hätte dazu gesagt: "Gastsein ist gut. Heimkommen ist besser."',
                'created_at' => '2017-09-10 10:45:22',
                'updated_at' => '2017-09-10 10:45:22',
            ),
            32 => 
            array (
                'id' => 533,
                'user_id' => 33,
                'photo_id' => 614,
                'body' => 'Joseph Stalin hätte dazu gesagt: "Wer die Vergangenheit preist, tadelt die Gegenwart."',
                'created_at' => '2017-09-15 09:18:24',
                'updated_at' => '2017-09-15 09:18:24',
            ),
            33 => 
            array (
                'id' => 534,
                'user_id' => 105,
                'photo_id' => 431,
                'body' => 'Lord Baden Powell hätte dazu gesagt: "Beten heißt, liebend an Jesus denken."',
                'created_at' => '2017-09-15 00:30:31',
                'updated_at' => '2017-09-15 00:30:31',
            ),
            34 => 
            array (
                'id' => 535,
                'user_id' => 167,
                'photo_id' => 571,
                'body' => 'Michael Jordon hätte dazu gesagt: "Ich bin nicht entmutigt, weil jeder als falsch verworfene Versuch ein weiterer Schritt vorwärts ist."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            35 => 
            array (
                'id' => 536,
                'user_id' => 44,
                'photo_id' => 438,
                'body' => 'V.Lenin hätte dazu gesagt: "Doppelt lebt, wer auch Vergangenes genießt."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            36 => 
            array (
                'id' => 537,
                'user_id' => 150,
                'photo_id' => 272,
                'body' => 'Ingrid Bergman hätte dazu gesagt: "Der Busch hat Augen, der Baumstumpf trägt einen Hut."',
                'created_at' => '2017-09-06 19:06:35',
                'updated_at' => '2017-09-06 19:06:35',
            ),
            37 => 
            array (
                'id' => 538,
                'user_id' => 194,
                'photo_id' => 10,
                'body' => 'Fidel Castro hätte dazu gesagt: "Die Nacht ist die Mutter von Gedanken."',
                'created_at' => '2017-09-02 22:52:16',
                'updated_at' => '2017-09-02 22:52:16',
            ),
            38 => 
            array (
                'id' => 539,
                'user_id' => 75,
                'photo_id' => 619,
                'body' => 'Oscar Wilde hätte dazu gesagt: "Das Leben ist eine große Gelegenheit, und es ist sehr schade, wenn der Mensch das erst zu spät erkennt."',
                'created_at' => '2017-08-27 15:46:38',
                'updated_at' => '2017-08-27 15:46:38',
            ),
            39 => 
            array (
                'id' => 540,
                'user_id' => 177,
                'photo_id' => 149,
                'body' => 'Coco Chanel hätte dazu gesagt: "Herr, ich rufe zu dir. Eile mir zur Hilfe; höre auf meine Stimme, wenn ich zu dir rufe."',
                'created_at' => '2017-09-12 06:10:26',
                'updated_at' => '2017-09-12 06:10:26',
            ),
            40 => 
            array (
                'id' => 541,
                'user_id' => 67,
                'photo_id' => 148,
                'body' => 'Pope Francis hätte dazu gesagt: "Seit zehn Jahren versuchen viele Ostdeutsche möglichst schnell Wessis zu werden. Natürlich ohne ihre Identität dabei aufzugeben. Hundertprozentig ist das jedoch nur ganz wenigen gelungen. Aber immerhin gibt es inzwischen i',
                'created_at' => '2017-09-07 11:15:35',
                'updated_at' => '2017-09-07 11:15:35',
            ),
            41 => 
            array (
                'id' => 542,
                'user_id' => 79,
                'photo_id' => 465,
                'body' => 'Amelia Earhart hätte dazu gesagt: "Verlaßt euch nicht auf Gewalt!"',
                'created_at' => '2017-09-18 12:59:53',
                'updated_at' => '2017-09-18 12:59:53',
            ),
            42 => 
            array (
                'id' => 543,
                'user_id' => 183,
                'photo_id' => 608,
                'body' => 'Adolf Hitler hätte dazu gesagt: "Ermuntert einander mit Psalmen und Lobgesängen und geistlichen Liedern, singt und spielt dem Herrn in euren Herzen."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            43 => 
            array (
                'id' => 544,
                'user_id' => 151,
                'photo_id' => 308,
                'body' => 'Sting hätte dazu gesagt: "Das einzige Mittel, den Irrtum zu vermeiden, ist die Unwissenheit."',
                'created_at' => '2017-09-09 03:53:18',
                'updated_at' => '2017-09-09 03:53:18',
            ),
            44 => 
            array (
                'id' => 545,
                'user_id' => 71,
                'photo_id' => 589,
                'body' => 'Mary Magdalene hätte dazu gesagt: "Willst du fremde Fehler zählen, heb an deinen an zu zählen. Ist mir recht, wird dir die Weile zu den fremden Fehlern fehlen."',
                'created_at' => '2017-09-09 14:02:16',
                'updated_at' => '2017-09-09 14:02:16',
            ),
            45 => 
            array (
                'id' => 546,
                'user_id' => 118,
                'photo_id' => 118,
                'body' => 'Alfred Hitchcock hätte dazu gesagt: "Trau niemals einem Menschen, der sich die Haare färbt. Er färbt auch seine Gefühle."',
                'created_at' => '2017-09-12 19:45:42',
                'updated_at' => '2017-09-12 19:45:42',
            ),
            46 => 
            array (
                'id' => 547,
                'user_id' => 54,
                'photo_id' => 175,
                'body' => 'Michael Jackson hätte dazu gesagt: "Treibt uns der Ehrgeiz zur Einsamkeit? Die Antwort muß lauten: Ja! Denn was ist ihm mehr zuwider als Gemeinsamkeit? Was ist ihm wichtiger als Bewegungsfreiheit?"',
                'created_at' => '2017-09-07 05:40:17',
                'updated_at' => '2017-09-07 05:40:17',
            ),
            47 => 
            array (
                'id' => 548,
                'user_id' => 134,
                'photo_id' => 353,
                'body' => 'Madonna hätte dazu gesagt: "Was ein Leben an Länge gewinnt, verliert es meist an Tiefe."',
                'created_at' => '2017-09-09 14:09:20',
                'updated_at' => '2017-09-09 14:09:20',
            ),
            48 => 
            array (
                'id' => 549,
                'user_id' => 165,
                'photo_id' => 352,
                'body' => 'Mata Hari hätte dazu gesagt: "Die Vergangenheit und die Erinnerung haben eine unendliche Kraft, und wenn auch schmerzliche Sehnsucht daraus quillt, sich ihnen hinzugeben, so liegt darin doch ein unaussprechlich süßer Genuß."',
                'created_at' => '2017-09-07 04:04:42',
                'updated_at' => '2017-09-07 04:04:42',
            ),
            49 => 
            array (
                'id' => 550,
                'user_id' => 171,
                'photo_id' => 192,
                'body' => 'Cleopatra hätte dazu gesagt: "Im Wald lehnt sich Baum an Baum, also warum nicht Mensch an Mensch?"',
                'created_at' => '2017-09-13 06:23:26',
                'updated_at' => '2017-09-13 06:23:26',
            ),
            50 => 
            array (
                'id' => 551,
                'user_id' => 99,
                'photo_id' => 401,
                'body' => 'Grace Kelly hätte dazu gesagt: "Nur der, der gar nichts tut, macht einen Fehler."',
                'created_at' => '2017-09-03 18:51:10',
                'updated_at' => '2017-09-03 18:51:10',
            ),
            51 => 
            array (
                'id' => 552,
                'user_id' => 169,
                'photo_id' => 699,
                'body' => 'Steve Jobs hätte dazu gesagt: "Wer sich getroffen fühlt, ist gemeint."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            52 => 
            array (
                'id' => 553,
                'user_id' => 57,
                'photo_id' => 266,
                'body' => 'Ronald Reagan hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-21 17:27:22',
                'updated_at' => '2017-09-21 17:27:22',
            ),
            53 => 
            array (
                'id' => 554,
                'user_id' => 114,
                'photo_id' => 301,
                'body' => 'Lionel Messi hätte dazu gesagt: "Bin, der mich sagen hört, »umsonst« – heißt »gratis«, doch auch »vergeblich« –, Gnade wie Nichtigkeit gleichermaßen."',
                'created_at' => '2017-08-27 00:44:26',
                'updated_at' => '2017-08-27 00:44:26',
            ),
            54 => 
            array (
                'id' => 555,
                'user_id' => 84,
                'photo_id' => 344,
                'body' => 'Babe Ruth hätte dazu gesagt: "Sein Leid in sich fressen."',
                'created_at' => '2017-09-14 08:59:18',
                'updated_at' => '2017-09-14 08:59:18',
            ),
            55 => 
            array (
                'id' => 556,
                'user_id' => 3,
                'photo_id' => 243,
                'body' => 'Bob Geldof hätte dazu gesagt: "Solang ein Weib liebt, liebt es in einem fort – ein Mann hat dazwischen zu tun."',
                'created_at' => '2017-09-08 06:51:11',
                'updated_at' => '2017-09-08 06:51:11',
            ),
            56 => 
            array (
                'id' => 557,
                'user_id' => 105,
                'photo_id' => 3,
                'body' => 'Roger Federer hätte dazu gesagt: "Mit Fristgeben gedeiht der Handel."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            57 => 
            array (
                'id' => 558,
                'user_id' => 63,
                'photo_id' => 20,
                'body' => 'Sigmund Freud hätte dazu gesagt: "Flausen im Kopf sorgen für die Federung des Denkapparates."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            58 => 
            array (
                'id' => 559,
                'user_id' => 157,
                'photo_id' => 330,
                'body' => 'Woodrow Wilson hätte dazu gesagt: "Wer sich nicht schämt, etwas nicht zu können, und sich nicht ärgert, etwas nicht zu können, der kommt voran."',
                'created_at' => '2017-09-23 07:11:15',
                'updated_at' => '2017-09-23 07:11:15',
            ),
            59 => 
            array (
                'id' => 560,
                'user_id' => 43,
                'photo_id' => 124,
                'body' => 'Mao Zedong hätte dazu gesagt: "Werden die Eisheiligen im Hundertjährigen Eskimo-Kalender als heiße Jungs aufgeführt?"',
                'created_at' => '2017-09-04 01:31:25',
                'updated_at' => '2017-09-04 01:31:25',
            ),
            60 => 
            array (
                'id' => 561,
                'user_id' => 15,
                'photo_id' => 97,
                'body' => 'Katherine Hepburn hätte dazu gesagt: "Viele verabschieden sich von dieser Welt, ohne jemals etwas gesagt zu haben."',
                'created_at' => '2017-09-16 22:35:23',
                'updated_at' => '2017-09-16 22:35:23',
            ),
            61 => 
            array (
                'id' => 562,
                'user_id' => 163,
                'photo_id' => 214,
                'body' => 'Audrey Hepburn hätte dazu gesagt: "Es ist weise, das Glück wahrzunehmen, das unser Herrgott einem zuschickt."',
                'created_at' => '2017-08-25 08:18:18',
                'updated_at' => '2017-08-25 08:18:18',
            ),
            62 => 
            array (
                'id' => 563,
                'user_id' => 88,
                'photo_id' => 149,
                'body' => 'David Beckham hätte dazu gesagt: "Rache ist teuer."',
                'created_at' => '2017-09-14 23:09:41',
                'updated_at' => '2017-09-14 23:09:41',
            ),
            63 => 
            array (
                'id' => 564,
                'user_id' => 108,
                'photo_id' => 481,
                'body' => 'Usain Bolt hätte dazu gesagt: "Die Macht ist bei den Fröhlichen."',
                'created_at' => '2017-09-09 12:52:11',
                'updated_at' => '2017-09-09 12:52:11',
            ),
            64 => 
            array (
                'id' => 565,
                'user_id' => 120,
                'photo_id' => 450,
                'body' => 'Carl Lewis hätte dazu gesagt: "Wenn du ein Geheimnis nicht bewahren willst, dann sag es einer Frau."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            65 => 
            array (
                'id' => 566,
                'user_id' => 119,
                'photo_id' => 11,
                'body' => 'Prince Charles hätte dazu gesagt: "Wenn man nichts hat, was man liebt, muß man lieben, was man hat."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            66 => 
            array (
                'id' => 567,
                'user_id' => 26,
                'photo_id' => 272,
                'body' => 'Jacqueline Kennedy Onassis hätte dazu gesagt: "Ein guter Anfang ist ein halber Erfolg."',
                'created_at' => '2017-09-12 13:57:50',
                'updated_at' => '2017-09-12 13:57:50',
            ),
            67 => 
            array (
                'id' => 568,
                'user_id' => 76,
                'photo_id' => 660,
                'body' => 'C.S. Lewis hätte dazu gesagt: "Popularität hat für mich immer etwas Unbehagliches."',
                'created_at' => '2017-09-24 11:22:56',
                'updated_at' => '2017-09-24 11:22:56',
            ),
            68 => 
            array (
                'id' => 569,
                'user_id' => 168,
                'photo_id' => 387,
                'body' => 'Billie Holiday hätte dazu gesagt: "Die Ehre ist die Poesie der Pflicht!"',
                'created_at' => '2017-09-20 06:53:37',
                'updated_at' => '2017-09-20 06:53:37',
            ),
            69 => 
            array (
                'id' => 570,
                'user_id' => 106,
                'photo_id' => 1,
                'body' => 'J.R.R. Tolkien hätte dazu gesagt: "Ein Mensch ohne Geld ist wie ein Wolf ohne Zähne."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            70 => 
            array (
                'id' => 571,
                'user_id' => 90,
                'photo_id' => 230,
                'body' => 'Billie Jean King hätte dazu gesagt: "Es ist irrelevant, wie lange sich die Dummköpfe unter dem Baum der Weisheit und Barmherzigkeit aufhalten. Für sie wird kein einziger Apfel herunter fallen."',
                'created_at' => '2017-09-14 13:01:15',
                'updated_at' => '2017-09-14 13:01:15',
            ),
            71 => 
            array (
                'id' => 572,
                'user_id' => 15,
                'photo_id' => 201,
                'body' => 'Anne Frank hätte dazu gesagt: "Christus und Moses, alle Seher und Magier waren "in der Ruhe". Martha arbeitete sich ab - Maria baute sich auf. Darum sagte Christus von Maria, sie habe das bessere Teil erwählt, da sie sich nicht zur Hausmagd erniedrigte gl',
                'created_at' => '2017-09-02 11:19:32',
                'updated_at' => '2017-09-02 11:19:32',
            ),
            72 => 
            array (
                'id' => 573,
                'user_id' => 184,
                'photo_id' => 486,
                'body' => 'Simon Bolivar hätte dazu gesagt: "Wo du zu tadeln hast, komm und hilf!"',
                'created_at' => '2017-09-08 05:31:12',
                'updated_at' => '2017-09-08 05:31:12',
            ),
            73 => 
            array (
                'id' => 574,
                'user_id' => 192,
                'photo_id' => 260,
                'body' => 'Marie Antoinette hätte dazu gesagt: "Lebendig ist das Wort Gottes, kraftvoll und schärfer als jedes zweischneidige Schwert."',
                'created_at' => '2017-09-10 10:45:23',
                'updated_at' => '2017-09-10 10:45:23',
            ),
            74 => 
            array (
                'id' => 575,
                'user_id' => 143,
                'photo_id' => 359,
                'body' => 'Christiano Ronaldo hätte dazu gesagt: "Wer niemals außer sich gerät, wird niemals in sich gehen."',
                'created_at' => '2017-09-15 09:18:25',
                'updated_at' => '2017-09-15 09:18:25',
            ),
            75 => 
            array (
                'id' => 576,
                'user_id' => 164,
                'photo_id' => 422,
                'body' => 'Emmeline Pankhurst hätte dazu gesagt: "Wer nicht läuft, gelangt nie ans Ziel!"',
                'created_at' => '2017-09-15 00:30:32',
                'updated_at' => '2017-09-15 00:30:32',
            ),
            76 => 
            array (
                'id' => 577,
                'user_id' => 169,
                'photo_id' => 468,
                'body' => 'Emile Zatopek hätte dazu gesagt: "Machen Sie es sich zur Aufgabe, höheren Ansprüchen zu genügen, als andere an Sie stellen."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            77 => 
            array (
                'id' => 578,
                'user_id' => 106,
                'photo_id' => 515,
                'body' => 'Lech Walesa hätte dazu gesagt: "Laß die anderen in Ruhe, sorge für dich selbst."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            78 => 
            array (
                'id' => 579,
                'user_id' => 68,
                'photo_id' => 671,
                'body' => 'Julie Andrews hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-06 19:06:36',
                'updated_at' => '2017-09-06 19:06:36',
            ),
            79 => 
            array (
                'id' => 580,
                'user_id' => 59,
                'photo_id' => 510,
                'body' => 'Florence Nightingale hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-02 22:52:17',
                'updated_at' => '2017-09-02 22:52:17',
            ),
            80 => 
            array (
                'id' => 581,
                'user_id' => 85,
                'photo_id' => 344,
                'body' => 'Marie Curie hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-08-27 15:46:39',
                'updated_at' => '2017-08-27 15:46:39',
            ),
            81 => 
            array (
                'id' => 582,
                'user_id' => 9,
                'photo_id' => 460,
                'body' => 'Stephen Hawking hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-12 06:10:27',
                'updated_at' => '2017-09-12 06:10:27',
            ),
            82 => 
            array (
                'id' => 583,
                'user_id' => 177,
                'photo_id' => 338,
                'body' => 'Tim Berners Lee hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-07 11:15:36',
                'updated_at' => '2017-09-07 11:15:36',
            ),
            83 => 
            array (
                'id' => 584,
                'user_id' => 171,
                'photo_id' => 616,
                'body' => 'Lance Armstrong hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-18 12:59:54',
                'updated_at' => '2017-09-18 12:59:54',
            ),
            84 => 
            array (
                'id' => 585,
                'user_id' => 3,
                'photo_id' => 279,
                'body' => 'Shakira hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            85 => 
            array (
                'id' => 586,
                'user_id' => 125,
                'photo_id' => 17,
                'body' => 'Jon Stewart hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-09 03:53:19',
                'updated_at' => '2017-09-09 03:53:19',
            ),
            86 => 
            array (
                'id' => 587,
                'user_id' => 93,
                'photo_id' => 291,
                'body' => 'Wright Brothers hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-09 14:02:17',
                'updated_at' => '2017-09-09 14:02:17',
            ),
            87 => 
            array (
                'id' => 588,
                'user_id' => 172,
                'photo_id' => 341,
                'body' => 'Paul Krugman hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-12 19:45:43',
                'updated_at' => '2017-09-12 19:45:43',
            ),
            88 => 
            array (
                'id' => 589,
                'user_id' => 180,
                'photo_id' => 523,
                'body' => 'Malala Yousafzai hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-07 05:40:18',
                'updated_at' => '2017-09-07 05:40:18',
            ),
            89 => 
            array (
                'id' => 590,
                'user_id' => 121,
                'photo_id' => 143,
                'body' => 'Marilyn Monroe hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-09 14:09:21',
                'updated_at' => '2017-09-09 14:09:21',
            ),
            90 => 
            array (
                'id' => 591,
                'user_id' => 191,
                'photo_id' => 365,
                'body' => 'Abraham Lincoln hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-07 04:04:43',
                'updated_at' => '2017-09-07 04:04:43',
            ),
            91 => 
            array (
                'id' => 592,
                'user_id' => 51,
                'photo_id' => 688,
                'body' => 'Mother Teresa hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-13 06:23:27',
                'updated_at' => '2017-09-13 06:23:27',
            ),
            92 => 
            array (
                'id' => 593,
                'user_id' => 15,
                'photo_id' => 652,
                'body' => 'John F. Kennedy hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-03 18:51:11',
                'updated_at' => '2017-09-03 18:51:11',
            ),
            93 => 
            array (
                'id' => 594,
                'user_id' => 124,
                'photo_id' => 212,
                'body' => 'Martin Luther King hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            94 => 
            array (
                'id' => 595,
                'user_id' => 37,
                'photo_id' => 154,
                'body' => 'Nelson Mandela hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-21 17:27:23',
                'updated_at' => '2017-09-21 17:27:23',
            ),
            95 => 
            array (
                'id' => 596,
                'user_id' => 173,
                'photo_id' => 214,
                'body' => 'Winston Churchill hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-08-27 00:44:27',
                'updated_at' => '2017-08-27 00:44:27',
            ),
            96 => 
            array (
                'id' => 597,
                'user_id' => 105,
                'photo_id' => 638,
                'body' => 'Bill Gates hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-14 08:59:19',
                'updated_at' => '2017-09-14 08:59:19',
            ),
            97 => 
            array (
                'id' => 598,
                'user_id' => 87,
                'photo_id' => 385,
                'body' => 'Muhammad Ali hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-08 06:51:12',
                'updated_at' => '2017-09-08 06:51:12',
            ),
            98 => 
            array (
                'id' => 599,
                'user_id' => 49,
                'photo_id' => 33,
                'body' => 'Mahatma Gandhi hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            99 => 
            array (
                'id' => 600,
                'user_id' => 126,
                'photo_id' => 85,
                'body' => 'Margaret Thatcher hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            100 => 
            array (
                'id' => 601,
                'user_id' => 16,
                'photo_id' => 608,
                'body' => 'Charles de Gaulle hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-23 07:11:16',
                'updated_at' => '2017-09-23 07:11:16',
            ),
            101 => 
            array (
                'id' => 602,
                'user_id' => 89,
                'photo_id' => 550,
                'body' => 'Christopher Columbus hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-04 01:31:26',
                'updated_at' => '2017-09-04 01:31:26',
            ),
            102 => 
            array (
                'id' => 603,
                'user_id' => 194,
                'photo_id' => 406,
                'body' => 'George Orwell hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-16 22:35:24',
                'updated_at' => '2017-09-16 22:35:24',
            ),
            103 => 
            array (
                'id' => 604,
                'user_id' => 76,
                'photo_id' => 184,
                'body' => 'Charles Darwin hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-08-25 08:18:19',
                'updated_at' => '2017-08-25 08:18:19',
            ),
            104 => 
            array (
                'id' => 605,
                'user_id' => 152,
                'photo_id' => 432,
                'body' => 'Elvis Presley hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-14 23:09:42',
                'updated_at' => '2017-09-14 23:09:42',
            ),
            105 => 
            array (
                'id' => 606,
                'user_id' => 80,
                'photo_id' => 324,
                'body' => 'Albert Einstein hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-09 12:52:12',
                'updated_at' => '2017-09-09 12:52:12',
            ),
            106 => 
            array (
                'id' => 607,
                'user_id' => 63,
                'photo_id' => 76,
                'body' => 'Paul McCartney hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            107 => 
            array (
                'id' => 608,
                'user_id' => 184,
                'photo_id' => 196,
                'body' => 'Plato hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            108 => 
            array (
                'id' => 609,
                'user_id' => 73,
                'photo_id' => 388,
                'body' => 'Queen Elizabeth hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-12 13:57:51',
                'updated_at' => '2017-09-12 13:57:51',
            ),
            109 => 
            array (
                'id' => 610,
                'user_id' => 28,
                'photo_id' => 100,
                'body' => 'Queen Victoria hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-24 11:22:57',
                'updated_at' => '2017-09-24 11:22:57',
            ),
            110 => 
            array (
                'id' => 611,
                'user_id' => 98,
                'photo_id' => 208,
                'body' => 'John M Keynes hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-20 06:53:38',
                'updated_at' => '2017-09-20 06:53:38',
            ),
            111 => 
            array (
                'id' => 612,
                'user_id' => 8,
                'photo_id' => 567,
                'body' => 'Mikhail Gorbachev hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            112 => 
            array (
                'id' => 613,
                'user_id' => 42,
                'photo_id' => 121,
                'body' => 'Jawaharlal Nehru hätte dazu gesagt: "Ich bin so aufgeregt."',
                'created_at' => '2017-09-14 13:01:16',
                'updated_at' => '2017-09-14 13:01:16',
            ),
            113 => 
            array (
                'id' => 614,
                'user_id' => 82,
                'photo_id' => 406,
                'body' => 'Leonardo da Vinci hätte dazu gesagt: "Wo will man aber Weisheit finden, und wo ist die Stätte der Einsicht?"',
                'created_at' => '2017-09-02 11:19:33',
                'updated_at' => '2017-09-02 11:19:33',
            ),
            114 => 
            array (
                'id' => 615,
                'user_id' => 107,
                'photo_id' => 91,
                'body' => 'Louis Pasteur hätte dazu gesagt: "Bevor du sprichst, denke siebenmal darüber nach!"',
                'created_at' => '2017-09-08 05:31:13',
                'updated_at' => '2017-09-08 05:31:13',
            ),
            115 => 
            array (
                'id' => 616,
                'user_id' => 164,
                'photo_id' => 114,
                'body' => 'Leo Tolstoy hätte dazu gesagt: "Nichts ist einem Menschen willkommener als ein Freund zur rechten Zeit."',
                'created_at' => '2017-09-10 10:45:24',
                'updated_at' => '2017-09-10 10:45:24',
            ),
            116 => 
            array (
                'id' => 617,
                'user_id' => 183,
                'photo_id' => 140,
                'body' => 'Pablo Picasso hätte dazu gesagt: "Das Alter ist eine Reisende der Nacht. die Erde verbirgt sich und der Himmel wird sichtbar."',
                'created_at' => '2017-09-15 09:18:26',
                'updated_at' => '2017-09-15 09:18:26',
            ),
            117 => 
            array (
                'id' => 618,
                'user_id' => 86,
                'photo_id' => 262,
                'body' => 'Vincent Van Gogh hätte dazu gesagt: "Wer den anderen liebt, hat das Gesetz erfüllt."',
                'created_at' => '2017-09-15 00:30:33',
                'updated_at' => '2017-09-15 00:30:33',
            ),
            118 => 
            array (
                'id' => 619,
                'user_id' => 100,
                'photo_id' => 507,
                'body' => 'Franklin D. Roosevelt hätte dazu gesagt: "Offene Hände schenken mehr als saubere Finger."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            119 => 
            array (
                'id' => 620,
                'user_id' => 103,
                'photo_id' => 512,
                'body' => 'Pope John Paul II hätte dazu gesagt: "Wer heile Hände hat, dem tut das Gift nichts an; Das Böse schadet nicht dem, der es nicht getan."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            120 => 
            array (
                'id' => 621,
                'user_id' => 13,
                'photo_id' => 151,
                'body' => 'Thomas Edison hätte dazu gesagt: "Kummer verdaut man am besten, wenn man ihn in Wein auflöst."',
                'created_at' => '2017-09-06 19:06:37',
                'updated_at' => '2017-09-06 19:06:37',
            ),
            121 => 
            array (
                'id' => 622,
                'user_id' => 179,
                'photo_id' => 221,
                'body' => 'Rosa Parks hätte dazu gesagt: "Die Kunst der Weisheit besteht darin, zu wissen, was man übersehen muß."',
                'created_at' => '2017-09-02 22:52:18',
                'updated_at' => '2017-09-02 22:52:18',
            ),
            122 => 
            array (
                'id' => 623,
                'user_id' => 56,
                'photo_id' => 571,
                'body' => 'Aung San Suu Kyi hätte dazu gesagt: "Grenzen der Technik: Ein Tauchsieder kocht auch nur mit Wasser."',
                'created_at' => '2017-08-27 15:46:40',
                'updated_at' => '2017-08-27 15:46:40',
            ),
            123 => 
            array (
                'id' => 624,
                'user_id' => 101,
                'photo_id' => 566,
                'body' => 'Lyndon Johnson hätte dazu gesagt: "Ein Haus wird gebaut, aber ein Zuhause wird geformt."',
                'created_at' => '2017-09-12 06:10:28',
                'updated_at' => '2017-09-12 06:10:28',
            ),
            124 => 
            array (
                'id' => 625,
                'user_id' => 185,
                'photo_id' => 428,
                'body' => 'Ludwig Beethoven hätte dazu gesagt: "Bemerke, höre, schweige. Urteile wenig, frage viel."',
                'created_at' => '2017-09-07 11:15:37',
                'updated_at' => '2017-09-07 11:15:37',
            ),
            125 => 
            array (
                'id' => 626,
                'user_id' => 119,
                'photo_id' => 483,
                'body' => 'Oprah Winfrey hätte dazu gesagt: "Es ist eine viel schlimmere Art des Stolzes, andere zu verkleinern, als sich selbst zu erheben."',
                'created_at' => '2017-09-18 12:59:55',
                'updated_at' => '2017-09-18 12:59:55',
            ),
            126 => 
            array (
                'id' => 627,
                'user_id' => 174,
                'photo_id' => 68,
                'body' => 'Indira Gandhi hätte dazu gesagt: "In den Bau der Welt taugt nur der abgeschliffene Stein."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            127 => 
            array (
                'id' => 628,
                'user_id' => 73,
                'photo_id' => 144,
                'body' => 'Eva Peron hätte dazu gesagt: "Doch schmecken muß man alles, heiß und kalt, wer jung kein Narr war, wird es, wenn er alt."',
                'created_at' => '2017-09-09 03:53:20',
                'updated_at' => '2017-09-09 03:53:20',
            ),
            128 => 
            array (
                'id' => 629,
                'user_id' => 49,
                'photo_id' => 383,
                'body' => 'Benazir Bhutto hätte dazu gesagt: "Gott ist der schweigende Partner bei allen großen Unternehmungen."',
                'created_at' => '2017-09-09 14:02:18',
                'updated_at' => '2017-09-09 14:02:18',
            ),
            129 => 
            array (
                'id' => 630,
                'user_id' => 149,
                'photo_id' => 433,
                'body' => 'Desmond Tutu hätte dazu gesagt: "Es wäre dumm, sich über die Außenwelt zu ärgern. Sie kümmert sich nicht darum."',
                'created_at' => '2017-09-12 19:45:44',
                'updated_at' => '2017-09-12 19:45:44',
            ),
            130 => 
            array (
                'id' => 631,
                'user_id' => 182,
                'photo_id' => 110,
                'body' => 'Dalai Lama hätte dazu gesagt: "Mit jedem Tag des Älterwerdens, befürchte ich genauso zu werden wie alle Menschen."',
                'created_at' => '2017-09-07 05:40:19',
                'updated_at' => '2017-09-07 05:40:19',
            ),
            131 => 
            array (
                'id' => 632,
                'user_id' => 24,
                'photo_id' => 220,
                'body' => 'Walt Disney hätte dazu gesagt: "Alkohol macht nicht nur viele Menschen unverträglich, er reduziert zum Glück auch die Anzahl der Unverträglichen."',
                'created_at' => '2017-09-09 14:09:22',
                'updated_at' => '2017-09-09 14:09:22',
            ),
            132 => 
            array (
                'id' => 633,
                'user_id' => 8,
                'photo_id' => 650,
                'body' => 'Peter Sellers hätte dazu gesagt: "Ich will den Namen Gottes loben mit einem Lied."',
                'created_at' => '2017-09-07 04:04:44',
                'updated_at' => '2017-09-07 04:04:44',
            ),
            133 => 
            array (
                'id' => 634,
                'user_id' => 41,
                'photo_id' => 442,
                'body' => 'Barack Obama hätte dazu gesagt: "Im Kriege verlieren alle, auch die Sieger."',
                'created_at' => '2017-09-13 06:23:28',
                'updated_at' => '2017-09-13 06:23:28',
            ),
            134 => 
            array (
                'id' => 635,
                'user_id' => 30,
                'photo_id' => 390,
                'body' => 'Malcolm X hätte dazu gesagt: "Zum Empfangen und Geben ist der Mensch geschaffen, zu Wirksamkeit und Freude, zum Tun und zum Leiden."',
                'created_at' => '2017-09-03 18:51:12',
                'updated_at' => '2017-09-03 18:51:12',
            ),
            135 => 
            array (
                'id' => 636,
                'user_id' => 27,
                'photo_id' => 336,
                'body' => 'J.K.Rowling hätte dazu gesagt: "Die Zeit ist ein großer Lehrer. Das Unglück: Sie tötet ihre Schüler."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            136 => 
            array (
                'id' => 637,
                'user_id' => 64,
                'photo_id' => 563,
                'body' => 'Richard Branson hätte dazu gesagt: "Vergangenes Leid muß Wohlsein fühlen lehren. Wer nie gedarbt, ist ohne Freude reich."',
                'created_at' => '2017-09-21 17:27:24',
                'updated_at' => '2017-09-21 17:27:24',
            ),
            137 => 
            array (
                'id' => 638,
                'user_id' => 146,
                'photo_id' => 179,
                'body' => 'Pele hätte dazu gesagt: "Die Natur ist ein Verschwender, der keine Kosten und Mühen scheut, um sein Werk in kürzester Zeit zu vollenden."',
                'created_at' => '2017-08-27 00:44:28',
                'updated_at' => '2017-08-27 00:44:28',
            ),
            138 => 
            array (
                'id' => 639,
                'user_id' => 169,
                'photo_id' => 457,
                'body' => 'Angelina Jolie hätte dazu gesagt: "Gilt es zu hören, sei der Erste. Sei der Letzte, wenn es zu reden gilt."',
                'created_at' => '2017-09-14 08:59:20',
                'updated_at' => '2017-09-14 08:59:20',
            ),
            139 => 
            array (
                'id' => 640,
                'user_id' => 44,
                'photo_id' => 256,
                'body' => 'Jesse Owens hätte dazu gesagt: "Der innere Friede hängt immer vom Menschen selbst ab: Der Mensch braucht zu seinem Glück im wahren Verstande nichts als ihn, und braucht, um ihn zu besitzen, nichts als sich."',
                'created_at' => '2017-09-08 06:51:13',
                'updated_at' => '2017-09-08 06:51:13',
            ),
            140 => 
            array (
                'id' => 641,
                'user_id' => 46,
                'photo_id' => 504,
                'body' => 'Ernest Hemingway hätte dazu gesagt: "Man kann nicht dem Arbeitnehmer helfen, indem man den Arbeitgeber beseitigt."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            141 => 
            array (
                'id' => 642,
                'user_id' => 54,
                'photo_id' => 665,
                'body' => 'John Lennon hätte dazu gesagt: "Wußten Sie schon, daß gerade ältere Herren junges Gemüse besonders schätzen?"',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            142 => 
            array (
                'id' => 643,
                'user_id' => 191,
                'photo_id' => 419,
                'body' => 'Henry Ford hätte dazu gesagt: "Jesus sagte: Steh auf, nimm deine Bahre und geh! Sofort wurde der Mann gesund, nahm seine Bahre und ging."',
                'created_at' => '2017-09-23 07:11:17',
                'updated_at' => '2017-09-23 07:11:17',
            ),
            143 => 
            array (
                'id' => 644,
                'user_id' => 106,
                'photo_id' => 687,
                'body' => 'Haile Selassie hätte dazu gesagt: "Das Gefallen am Schönen und die Macht der Liebe sind etwas Natürliches, weder befohlen noch verboten, denn die Herzen stehen in Gottes Hand, und er wendet sie."',
                'created_at' => '2017-09-04 01:31:27',
                'updated_at' => '2017-09-04 01:31:27',
            ),
            144 => 
            array (
                'id' => 645,
                'user_id' => 86,
                'photo_id' => 553,
                'body' => 'Joseph Stalin hätte dazu gesagt: "Gut ist eine lange Wurst und eine kurze Predigt."',
                'created_at' => '2017-09-16 22:35:25',
                'updated_at' => '2017-09-16 22:35:25',
            ),
            145 => 
            array (
                'id' => 646,
                'user_id' => 171,
                'photo_id' => 622,
                'body' => 'Lord Baden Powell hätte dazu gesagt: "Wir sind nicht, wofür wir uns oft halten, doch wir sind viel mehr, als die meisten von uns ahnen."',
                'created_at' => '2017-08-25 08:18:20',
                'updated_at' => '2017-08-25 08:18:20',
            ),
            146 => 
            array (
                'id' => 647,
                'user_id' => 115,
                'photo_id' => 661,
                'body' => 'Michael Jordon hätte dazu gesagt: "Mäßige deinen Zorn; es fallen die Funken erst auf dich; auf den Feind, wenn sie je treffen, zuletzt."',
                'created_at' => '2017-09-14 23:09:43',
                'updated_at' => '2017-09-14 23:09:43',
            ),
            147 => 
            array (
                'id' => 648,
                'user_id' => 98,
                'photo_id' => 613,
                'body' => 'V.Lenin hätte dazu gesagt: "Unter Umständen ist es für manches Kind am besten, wenn es gar nicht erzogen wird."',
                'created_at' => '2017-09-09 12:52:13',
                'updated_at' => '2017-09-09 12:52:13',
            ),
            148 => 
            array (
                'id' => 649,
                'user_id' => 47,
                'photo_id' => 223,
                'body' => 'Ingrid Bergman hätte dazu gesagt: "Nirgends zeigt sich der Mensch empfindlicher als in seinem Egoismus, und durch nichts ist er leichter zu besiegen als durch ihn."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            149 => 
            array (
                'id' => 650,
                'user_id' => 35,
                'photo_id' => 191,
                'body' => 'Fidel Castro hätte dazu gesagt: "Ein guter Nachbar ist besser als viele böse Verwandten."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            150 => 
            array (
                'id' => 651,
                'user_id' => 95,
                'photo_id' => 237,
                'body' => 'Oscar Wilde hätte dazu gesagt: "Es regnet auf alle Dächer."',
                'created_at' => '2017-09-12 13:57:52',
                'updated_at' => '2017-09-12 13:57:52',
            ),
            151 => 
            array (
                'id' => 652,
                'user_id' => 130,
                'photo_id' => 122,
                'body' => 'Coco Chanel hätte dazu gesagt: "Was man heute politische Ansichten nennt, ist meist nur der Ausdruck wirtschaftlicher und sozialer Interessen."',
                'created_at' => '2017-09-24 11:22:58',
                'updated_at' => '2017-09-24 11:22:58',
            ),
            152 => 
            array (
                'id' => 653,
                'user_id' => 118,
                'photo_id' => 79,
                'body' => 'Pope Francis hätte dazu gesagt: "Und dann war da noch die Frustrierte, die sagte: "Ich habe nie bekommen, was ich wollte. Ich wollte, ich hätte das bekommen, was ich wollte. Aber nicht einmal das will ich."',
                'created_at' => '2017-09-20 06:53:39',
                'updated_at' => '2017-09-20 06:53:39',
            ),
            153 => 
            array (
                'id' => 654,
                'user_id' => 98,
                'photo_id' => 35,
                'body' => 'Amelia Earhart hätte dazu gesagt: "In dem ehelichen Leben soll das vereinigte Paar gleichsam eine einzige moralische Person ausmachen, welche durch den Verstand des Mannes und den Geschmack der Frauen belebt und regiert wird."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            154 => 
            array (
                'id' => 655,
                'user_id' => 155,
                'photo_id' => 117,
                'body' => 'Adolf Hitler hätte dazu gesagt: "Nichts ist schwerer zu ertragen als Reißverschluß auf vollen Magen."',
                'created_at' => '2017-09-14 13:01:17',
                'updated_at' => '2017-09-14 13:01:17',
            ),
            155 => 
            array (
                'id' => 656,
                'user_id' => 30,
                'photo_id' => 277,
                'body' => 'Sting hätte dazu gesagt: "Das Gewissen ist der Puls der Vernunft."',
                'created_at' => '2017-09-02 11:19:34',
                'updated_at' => '2017-09-02 11:19:34',
            ),
            156 => 
            array (
                'id' => 657,
                'user_id' => 79,
                'photo_id' => 168,
                'body' => 'Mary Magdalene hätte dazu gesagt: "Wer mit dem Kopf durch die Wand will, holt sich nur Beulen."',
                'created_at' => '2017-09-08 05:31:14',
                'updated_at' => '2017-09-08 05:31:14',
            ),
            157 => 
            array (
                'id' => 658,
                'user_id' => 44,
                'photo_id' => 11,
                'body' => 'Alfred Hitchcock hätte dazu gesagt: "Nur ein Tor zertrümmert den Spiegel, wenn ihm das Spiegelbild mißfällt."',
                'created_at' => '2017-09-10 10:45:25',
                'updated_at' => '2017-09-10 10:45:25',
            ),
            158 => 
            array (
                'id' => 659,
                'user_id' => 31,
                'photo_id' => 405,
                'body' => 'Michael Jackson hätte dazu gesagt: "Faulheit, Frauendienst, Kränklichkeit, zu große Anhänglichkeit an den Geburtsort, Genügsamkeit und Furchtsamkeit, diese sind sechs Hindernisse der Größe."',
                'created_at' => '2017-09-15 09:18:27',
                'updated_at' => '2017-09-15 09:18:27',
            ),
            159 => 
            array (
                'id' => 660,
                'user_id' => 51,
                'photo_id' => 175,
                'body' => 'Madonna hätte dazu gesagt: "Laß euch nicht mit falschen Göttern ein!"',
                'created_at' => '2017-09-15 00:30:34',
                'updated_at' => '2017-09-15 00:30:34',
            ),
            160 => 
            array (
                'id' => 661,
                'user_id' => 70,
                'photo_id' => 151,
                'body' => 'Mata Hari hätte dazu gesagt: "Wer sich entschieden hat, etwas zu tun, und an nichts anderes denkt, überwindet alle Hindernisse."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            161 => 
            array (
                'id' => 662,
                'user_id' => 20,
                'photo_id' => 586,
                'body' => 'Cleopatra hätte dazu gesagt: "Würden die Pforten der Wahrnehmung gereinigt, erschiene den Menschen alles, wie es ist: unendlich."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            162 => 
            array (
                'id' => 663,
                'user_id' => 103,
                'photo_id' => 349,
                'body' => 'Grace Kelly hätte dazu gesagt: "Es gibt nicht nur einen bunten Hund in der Welt."',
                'created_at' => '2017-09-06 19:06:38',
                'updated_at' => '2017-09-06 19:06:38',
            ),
            163 => 
            array (
                'id' => 664,
                'user_id' => 30,
                'photo_id' => 188,
                'body' => 'Steve Jobs hätte dazu gesagt: "Als Sklaven und Herren ihrer Eigenliebe leben die Menschen dahin, nicht um zu leben, sondern um andere glauben zu machen, sie hätten gelebt."',
                'created_at' => '2017-09-02 22:52:19',
                'updated_at' => '2017-09-02 22:52:19',
            ),
            164 => 
            array (
                'id' => 665,
                'user_id' => 68,
                'photo_id' => 544,
                'body' => 'Ronald Reagan hätte dazu gesagt: "Du lebst nicht für dich allein auf Erden."',
                'created_at' => '2017-08-27 15:46:41',
                'updated_at' => '2017-08-27 15:46:41',
            ),
            165 => 
            array (
                'id' => 666,
                'user_id' => 185,
                'photo_id' => 442,
                'body' => 'Lionel Messi hätte dazu gesagt: "Was ist der Mensch, daß du seiner gedenkst?"',
                'created_at' => '2017-09-12 06:10:29',
                'updated_at' => '2017-09-12 06:10:29',
            ),
            166 => 
            array (
                'id' => 667,
                'user_id' => 30,
                'photo_id' => 379,
                'body' => 'Babe Ruth hätte dazu gesagt: "Solange die Menschen sterben können und das Leben lieben, wird der Arzt verspottet und gut bezahlt werden."',
                'created_at' => '2017-09-07 11:15:38',
                'updated_at' => '2017-09-07 11:15:38',
            ),
            167 => 
            array (
                'id' => 668,
                'user_id' => 41,
                'photo_id' => 208,
                'body' => 'Bob Geldof hätte dazu gesagt: "Gastsein ist gut. Heimkommen ist besser."',
                'created_at' => '2017-09-18 12:59:56',
                'updated_at' => '2017-09-18 12:59:56',
            ),
            168 => 
            array (
                'id' => 669,
                'user_id' => 41,
                'photo_id' => 345,
                'body' => 'Roger Federer hätte dazu gesagt: "Wer die Vergangenheit preist, tadelt die Gegenwart."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            169 => 
            array (
                'id' => 670,
                'user_id' => 22,
                'photo_id' => 54,
                'body' => 'Sigmund Freud hätte dazu gesagt: "Beten heißt, liebend an Jesus denken."',
                'created_at' => '2017-09-09 03:53:21',
                'updated_at' => '2017-09-09 03:53:21',
            ),
            170 => 
            array (
                'id' => 671,
                'user_id' => 8,
                'photo_id' => 59,
                'body' => 'Woodrow Wilson hätte dazu gesagt: "Ich bin nicht entmutigt, weil jeder als falsch verworfene Versuch ein weiterer Schritt vorwärts ist."',
                'created_at' => '2017-09-09 14:02:19',
                'updated_at' => '2017-09-09 14:02:19',
            ),
            171 => 
            array (
                'id' => 672,
                'user_id' => 52,
                'photo_id' => 481,
                'body' => 'Mao Zedong hätte dazu gesagt: "Doppelt lebt, wer auch Vergangenes genießt."',
                'created_at' => '2017-09-12 19:45:45',
                'updated_at' => '2017-09-12 19:45:45',
            ),
            172 => 
            array (
                'id' => 673,
                'user_id' => 54,
                'photo_id' => 698,
                'body' => 'Katherine Hepburn hätte dazu gesagt: "Der Busch hat Augen, der Baumstumpf trägt einen Hut."',
                'created_at' => '2017-09-07 05:40:20',
                'updated_at' => '2017-09-07 05:40:20',
            ),
            173 => 
            array (
                'id' => 674,
                'user_id' => 23,
                'photo_id' => 421,
                'body' => 'Audrey Hepburn hätte dazu gesagt: "Die Nacht ist die Mutter von Gedanken."',
                'created_at' => '2017-09-09 14:09:23',
                'updated_at' => '2017-09-09 14:09:23',
            ),
            174 => 
            array (
                'id' => 675,
                'user_id' => 184,
                'photo_id' => 578,
                'body' => 'David Beckham hätte dazu gesagt: "Das Leben ist eine große Gelegenheit, und es ist sehr schade, wenn der Mensch das erst zu spät erkennt."',
                'created_at' => '2017-09-07 04:04:45',
                'updated_at' => '2017-09-07 04:04:45',
            ),
            175 => 
            array (
                'id' => 676,
                'user_id' => 142,
                'photo_id' => 233,
                'body' => 'Usain Bolt hätte dazu gesagt: "Herr, ich rufe zu dir. Eile mir zur Hilfe; höre auf meine Stimme, wenn ich zu dir rufe."',
                'created_at' => '2017-09-13 06:23:29',
                'updated_at' => '2017-09-13 06:23:29',
            ),
            176 => 
            array (
                'id' => 677,
                'user_id' => 25,
                'photo_id' => 95,
                'body' => 'Carl Lewis hätte dazu gesagt: "Seit zehn Jahren versuchen viele Ostdeutsche möglichst schnell Wessis zu werden. Natürlich ohne ihre Identität dabei aufzugeben. Hundertprozentig ist das jedoch nur ganz wenigen gelungen. Aber immerhin gibt es inzwischen im ',
                'created_at' => '2017-09-03 18:51:13',
                'updated_at' => '2017-09-03 18:51:13',
            ),
            177 => 
            array (
                'id' => 678,
                'user_id' => 51,
                'photo_id' => 4,
                'body' => 'Prince Charles hätte dazu gesagt: "Verlaßt euch nicht auf Gewalt!"',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            178 => 
            array (
                'id' => 679,
                'user_id' => 129,
                'photo_id' => 573,
                'body' => 'Jacqueline Kennedy Onassis hätte dazu gesagt: "Ermuntert einander mit Psalmen und Lobgesängen und geistlichen Liedern, singt und spielt dem Herrn in euren Herzen."',
                'created_at' => '2017-09-21 17:27:25',
                'updated_at' => '2017-09-21 17:27:25',
            ),
            179 => 
            array (
                'id' => 680,
                'user_id' => 109,
                'photo_id' => 15,
                'body' => 'C.S. Lewis hätte dazu gesagt: "Das einzige Mittel, den Irrtum zu vermeiden, ist die Unwissenheit."',
                'created_at' => '2017-08-27 00:44:29',
                'updated_at' => '2017-08-27 00:44:29',
            ),
            180 => 
            array (
                'id' => 681,
                'user_id' => 75,
                'photo_id' => 531,
                'body' => 'Billie Holiday hätte dazu gesagt: "Willst du fremde Fehler zählen, heb an deinen an zu zählen. Ist mir recht, wird dir die Weile zu den fremden Fehlern fehlen."',
                'created_at' => '2017-09-14 08:59:21',
                'updated_at' => '2017-09-14 08:59:21',
            ),
            181 => 
            array (
                'id' => 682,
                'user_id' => 55,
                'photo_id' => 68,
                'body' => 'J.R.R. Tolkien hätte dazu gesagt: "Trau niemals einem Menschen, der sich die Haare färbt. Er färbt auch seine Gefühle."',
                'created_at' => '2017-09-08 06:51:14',
                'updated_at' => '2017-09-08 06:51:14',
            ),
            182 => 
            array (
                'id' => 683,
                'user_id' => 181,
                'photo_id' => 467,
                'body' => 'Billie Jean King hätte dazu gesagt: "Treibt uns der Ehrgeiz zur Einsamkeit? Die Antwort muß lauten: Ja! Denn was ist ihm mehr zuwider als Gemeinsamkeit? Was ist ihm wichtiger als Bewegungsfreiheit?"',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            183 => 
            array (
                'id' => 684,
                'user_id' => 93,
                'photo_id' => 510,
                'body' => 'Anne Frank hätte dazu gesagt: "Was ein Leben an Länge gewinnt, verliert es meist an Tiefe."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            184 => 
            array (
                'id' => 685,
                'user_id' => 125,
                'photo_id' => 17,
                'body' => 'Simon Bolivar hätte dazu gesagt: "Die Vergangenheit und die Erinnerung haben eine unendliche Kraft, und wenn auch schmerzliche Sehnsucht daraus quillt, sich ihnen hinzugeben, so liegt darin doch ein unaussprechlich süßer Genuß."',
                'created_at' => '2017-09-23 07:11:18',
                'updated_at' => '2017-09-23 07:11:18',
            ),
            185 => 
            array (
                'id' => 686,
                'user_id' => 95,
                'photo_id' => 234,
                'body' => 'Marie Antoinette hätte dazu gesagt: "Im Wald lehnt sich Baum an Baum, also warum nicht Mensch an Mensch?"',
                'created_at' => '2017-09-04 01:31:28',
                'updated_at' => '2017-09-04 01:31:28',
            ),
            186 => 
            array (
                'id' => 687,
                'user_id' => 108,
                'photo_id' => 455,
                'body' => 'Christiano Ronaldo hätte dazu gesagt: "Nur der, der gar nichts tut, macht einen Fehler."',
                'created_at' => '2017-09-16 22:35:26',
                'updated_at' => '2017-09-16 22:35:26',
            ),
            187 => 
            array (
                'id' => 688,
                'user_id' => 156,
                'photo_id' => 444,
                'body' => 'Emmeline Pankhurst hätte dazu gesagt: "Wer sich getroffen fühlt, ist gemeint."',
                'created_at' => '2017-08-25 08:18:21',
                'updated_at' => '2017-08-25 08:18:21',
            ),
            188 => 
            array (
                'id' => 689,
                'user_id' => 20,
                'photo_id' => 580,
                'body' => 'Emile Zatopek hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-14 23:09:44',
                'updated_at' => '2017-09-14 23:09:44',
            ),
            189 => 
            array (
                'id' => 690,
                'user_id' => 31,
                'photo_id' => 378,
                'body' => 'Lech Walesa hätte dazu gesagt: "Bin, der mich sagen hört, »umsonst« – heißt »gratis«, doch auch »vergeblich« –, Gnade wie Nichtigkeit gleichermaßen."',
                'created_at' => '2017-09-09 12:52:14',
                'updated_at' => '2017-09-09 12:52:14',
            ),
            190 => 
            array (
                'id' => 691,
                'user_id' => 38,
                'photo_id' => 535,
                'body' => 'Marilyn Monroe hätte dazu gesagt: "Sein Leid in sich fressen."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            191 => 
            array (
                'id' => 692,
                'user_id' => 150,
                'photo_id' => 214,
                'body' => 'Abraham Lincoln hätte dazu gesagt: "Solang ein Weib liebt, liebt es in einem fort – ein Mann hat dazwischen zu tun."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            192 => 
            array (
                'id' => 693,
                'user_id' => 151,
                'photo_id' => 314,
                'body' => 'Mother Teresa hätte dazu gesagt: "Mit Fristgeben gedeiht der Handel."',
                'created_at' => '2017-09-12 13:57:53',
                'updated_at' => '2017-09-12 13:57:53',
            ),
            193 => 
            array (
                'id' => 694,
                'user_id' => 166,
                'photo_id' => 206,
                'body' => 'John F. Kennedy hätte dazu gesagt: "Flausen im Kopf sorgen für die Federung des Denkapparates."',
                'created_at' => '2017-09-24 11:22:59',
                'updated_at' => '2017-09-24 11:22:59',
            ),
            194 => 
            array (
                'id' => 695,
                'user_id' => 59,
                'photo_id' => 52,
                'body' => 'Martin Luther King hätte dazu gesagt: "Wer sich nicht schämt, etwas nicht zu können, und sich nicht ärgert, etwas nicht zu können, der kommt voran."',
                'created_at' => '2017-09-20 06:53:40',
                'updated_at' => '2017-09-20 06:53:40',
            ),
            195 => 
            array (
                'id' => 696,
                'user_id' => 77,
                'photo_id' => 56,
                'body' => 'Nelson Mandela hätte dazu gesagt: "Werden die Eisheiligen im Hundertjährigen Eskimo-Kalender als heiße Jungs aufgeführt?"',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            196 => 
            array (
                'id' => 697,
                'user_id' => 54,
                'photo_id' => 299,
                'body' => 'Winston Churchill hätte dazu gesagt: "Viele verabschieden sich von dieser Welt, ohne jemals etwas gesagt zu haben."',
                'created_at' => '2017-09-14 13:01:18',
                'updated_at' => '2017-09-14 13:01:18',
            ),
            197 => 
            array (
                'id' => 698,
                'user_id' => 108,
                'photo_id' => 595,
                'body' => 'Bill Gates hätte dazu gesagt: "Es ist weise, das Glück wahrzunehmen, das unser Herrgott einem zuschickt."',
                'created_at' => '2017-09-02 11:19:35',
                'updated_at' => '2017-09-02 11:19:35',
            ),
            198 => 
            array (
                'id' => 699,
                'user_id' => 88,
                'photo_id' => 543,
                'body' => 'Muhammad Ali hätte dazu gesagt: "Rache ist teuer."',
                'created_at' => '2017-09-08 05:31:15',
                'updated_at' => '2017-09-08 05:31:15',
            ),
            199 => 
            array (
                'id' => 700,
                'user_id' => 85,
                'photo_id' => 506,
                'body' => 'Mahatma Gandhi hätte dazu gesagt: "Die Macht ist bei den Fröhlichen."',
                'created_at' => '2017-09-10 10:45:26',
                'updated_at' => '2017-09-10 10:45:26',
            ),
            200 => 
            array (
                'id' => 701,
                'user_id' => 179,
                'photo_id' => 615,
                'body' => 'Margaret Thatcher hätte dazu gesagt: "Wenn du ein Geheimnis nicht bewahren willst, dann sag es einer Frau."',
                'created_at' => '2017-09-15 09:18:28',
                'updated_at' => '2017-09-15 09:18:28',
            ),
            201 => 
            array (
                'id' => 702,
                'user_id' => 151,
                'photo_id' => 80,
                'body' => 'Charles de Gaulle hätte dazu gesagt: "Wenn man nichts hat, was man liebt, muß man lieben, was man hat."',
                'created_at' => '2017-09-15 00:30:35',
                'updated_at' => '2017-09-15 00:30:35',
            ),
            202 => 
            array (
                'id' => 703,
                'user_id' => 164,
                'photo_id' => 498,
                'body' => 'Christopher Columbus hätte dazu gesagt: "Ein guter Anfang ist ein halber Erfolg."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            203 => 
            array (
                'id' => 704,
                'user_id' => 184,
                'photo_id' => 421,
                'body' => 'George Orwell hätte dazu gesagt: "Popularität hat für mich immer etwas Unbehagliches."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            204 => 
            array (
                'id' => 705,
                'user_id' => 109,
                'photo_id' => 623,
                'body' => 'Charles Darwin hätte dazu gesagt: "Die Ehre ist die Poesie der Pflicht!"',
                'created_at' => '2017-09-06 19:06:39',
                'updated_at' => '2017-09-06 19:06:39',
            ),
            205 => 
            array (
                'id' => 706,
                'user_id' => 177,
                'photo_id' => 210,
                'body' => 'Elvis Presley hätte dazu gesagt: "Ein Mensch ohne Geld ist wie ein Wolf ohne Zähne."',
                'created_at' => '2017-09-02 22:52:20',
                'updated_at' => '2017-09-02 22:52:20',
            ),
            206 => 
            array (
                'id' => 707,
                'user_id' => 74,
                'photo_id' => 417,
                'body' => 'Albert Einstein hätte dazu gesagt: "Es ist irrelevant, wie lange sich die Dummköpfe unter dem Baum der Weisheit und Barmherzigkeit aufhalten. Für sie wird kein einziger Apfel herunter fallen."',
                'created_at' => '2017-08-27 15:46:42',
                'updated_at' => '2017-08-27 15:46:42',
            ),
            207 => 
            array (
                'id' => 708,
                'user_id' => 43,
                'photo_id' => 474,
                'body' => 'Paul McCartney hätte dazu gesagt: "Christus und Moses, alle Seher und Magier waren "in der Ruhe". Martha arbeitete sich ab - Maria baute sich auf. Darum sagte Christus von Maria, sie habe das bessere Teil erwählt, da sie sich nicht zur Hausmagd erniedrigt',
                'created_at' => '2017-09-12 06:10:30',
                'updated_at' => '2017-09-12 06:10:30',
            ),
            208 => 
            array (
                'id' => 709,
                'user_id' => 103,
                'photo_id' => 371,
                'body' => 'Plato hätte dazu gesagt: "Wo du zu tadeln hast, komm und hilf!"',
                'created_at' => '2017-09-07 11:15:39',
                'updated_at' => '2017-09-07 11:15:39',
            ),
            209 => 
            array (
                'id' => 710,
                'user_id' => 174,
                'photo_id' => 663,
                'body' => 'Queen Elizabeth hätte dazu gesagt: "Lebendig ist das Wort Gottes, kraftvoll und schärfer als jedes zweischneidige Schwert."',
                'created_at' => '2017-09-18 12:59:57',
                'updated_at' => '2017-09-18 12:59:57',
            ),
            210 => 
            array (
                'id' => 711,
                'user_id' => 180,
                'photo_id' => 176,
                'body' => 'Queen Victoria hätte dazu gesagt: "Wer niemals außer sich gerät, wird niemals in sich gehen."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            211 => 
            array (
                'id' => 712,
                'user_id' => 133,
                'photo_id' => 622,
                'body' => 'John M Keynes hätte dazu gesagt: "Wer nicht läuft, gelangt nie ans Ziel!"',
                'created_at' => '2017-09-09 03:53:22',
                'updated_at' => '2017-09-09 03:53:22',
            ),
            212 => 
            array (
                'id' => 713,
                'user_id' => 41,
                'photo_id' => 278,
                'body' => 'Mikhail Gorbachev hätte dazu gesagt: "Machen Sie es sich zur Aufgabe, höheren Ansprüchen zu genügen, als andere an Sie stellen."',
                'created_at' => '2017-09-09 14:02:20',
                'updated_at' => '2017-09-09 14:02:20',
            ),
            213 => 
            array (
                'id' => 714,
                'user_id' => 80,
                'photo_id' => 67,
                'body' => 'Jawaharlal Nehru hätte dazu gesagt: "Laß die anderen in Ruhe, sorge für dich selbst."',
                'created_at' => '2017-09-12 19:45:46',
                'updated_at' => '2017-09-12 19:45:46',
            ),
            214 => 
            array (
                'id' => 715,
                'user_id' => 30,
                'photo_id' => 40,
                'body' => 'Leonardo da Vinci hätte dazu gesagt: "Ich bin so aufgeregt."',
                'created_at' => '2017-09-07 05:40:21',
                'updated_at' => '2017-09-07 05:40:21',
            ),
            215 => 
            array (
                'id' => 716,
                'user_id' => 59,
                'photo_id' => 79,
                'body' => 'Louis Pasteur hätte dazu gesagt: "Wo will man aber Weisheit finden, und wo ist die Stätte der Einsicht?"',
                'created_at' => '2017-09-09 14:09:24',
                'updated_at' => '2017-09-09 14:09:24',
            ),
            216 => 
            array (
                'id' => 717,
                'user_id' => 87,
                'photo_id' => 561,
                'body' => 'Leo Tolstoy hätte dazu gesagt: "Bevor du sprichst, denke siebenmal darüber nach!"',
                'created_at' => '2017-09-07 04:04:46',
                'updated_at' => '2017-09-07 04:04:46',
            ),
            217 => 
            array (
                'id' => 718,
                'user_id' => 192,
                'photo_id' => 327,
                'body' => 'Pablo Picasso hätte dazu gesagt: "Nichts ist einem Menschen willkommener als ein Freund zur rechten Zeit."',
                'created_at' => '2017-09-13 06:23:30',
                'updated_at' => '2017-09-13 06:23:30',
            ),
            218 => 
            array (
                'id' => 719,
                'user_id' => 152,
                'photo_id' => 132,
                'body' => 'Vincent Van Gogh hätte dazu gesagt: "Das Alter ist eine Reisende der Nacht. die Erde verbirgt sich und der Himmel wird sichtbar."',
                'created_at' => '2017-09-03 18:51:14',
                'updated_at' => '2017-09-03 18:51:14',
            ),
            219 => 
            array (
                'id' => 720,
                'user_id' => 179,
                'photo_id' => 19,
                'body' => 'Franklin D. Roosevelt hätte dazu gesagt: "Wer den anderen liebt, hat das Gesetz erfüllt."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            220 => 
            array (
                'id' => 721,
                'user_id' => 55,
                'photo_id' => 523,
                'body' => 'Pope John Paul II hätte dazu gesagt: "Offene Hände schenken mehr als saubere Finger."',
                'created_at' => '2017-09-21 17:27:26',
                'updated_at' => '2017-09-21 17:27:26',
            ),
            221 => 
            array (
                'id' => 722,
                'user_id' => 175,
                'photo_id' => 255,
                'body' => 'Thomas Edison hätte dazu gesagt: "Wer heile Hände hat, dem tut das Gift nichts an; Das Böse schadet nicht dem, der es nicht getan."',
                'created_at' => '2017-08-27 00:44:30',
                'updated_at' => '2017-08-27 00:44:30',
            ),
            222 => 
            array (
                'id' => 723,
                'user_id' => 40,
                'photo_id' => 309,
                'body' => 'Rosa Parks hätte dazu gesagt: "Kummer verdaut man am besten, wenn man ihn in Wein auflöst."',
                'created_at' => '2017-09-14 08:59:22',
                'updated_at' => '2017-09-14 08:59:22',
            ),
            223 => 
            array (
                'id' => 724,
                'user_id' => 161,
                'photo_id' => 171,
                'body' => 'Aung San Suu Kyi hätte dazu gesagt: "Die Kunst der Weisheit besteht darin, zu wissen, was man übersehen muß."',
                'created_at' => '2017-09-08 06:51:15',
                'updated_at' => '2017-09-08 06:51:15',
            ),
            224 => 
            array (
                'id' => 725,
                'user_id' => 124,
                'photo_id' => 121,
                'body' => 'Lyndon Johnson hätte dazu gesagt: "Grenzen der Technik: Ein Tauchsieder kocht auch nur mit Wasser."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            225 => 
            array (
                'id' => 726,
                'user_id' => 75,
                'photo_id' => 647,
                'body' => 'Ludwig Beethoven hätte dazu gesagt: "Ein Haus wird gebaut, aber ein Zuhause wird geformt."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            226 => 
            array (
                'id' => 727,
                'user_id' => 66,
                'photo_id' => 11,
                'body' => 'Oprah Winfrey hätte dazu gesagt: "Bemerke, höre, schweige. Urteile wenig, frage viel."',
                'created_at' => '2017-09-23 07:11:19',
                'updated_at' => '2017-09-23 07:11:19',
            ),
            227 => 
            array (
                'id' => 728,
                'user_id' => 96,
                'photo_id' => 452,
                'body' => 'Indira Gandhi hätte dazu gesagt: "Es ist eine viel schlimmere Art des Stolzes, andere zu verkleinern, als sich selbst zu erheben."',
                'created_at' => '2017-09-04 01:31:29',
                'updated_at' => '2017-09-04 01:31:29',
            ),
            228 => 
            array (
                'id' => 729,
                'user_id' => 188,
                'photo_id' => 602,
                'body' => 'Eva Peron hätte dazu gesagt: "In den Bau der Welt taugt nur der abgeschliffene Stein."',
                'created_at' => '2017-09-16 22:35:27',
                'updated_at' => '2017-09-16 22:35:27',
            ),
            229 => 
            array (
                'id' => 730,
                'user_id' => 183,
                'photo_id' => 624,
                'body' => 'Benazir Bhutto hätte dazu gesagt: "Doch schmecken muß man alles, heiß und kalt, wer jung kein Narr war, wird es, wenn er alt."',
                'created_at' => '2017-08-25 08:18:22',
                'updated_at' => '2017-08-25 08:18:22',
            ),
            230 => 
            array (
                'id' => 731,
                'user_id' => 72,
                'photo_id' => 574,
                'body' => 'Desmond Tutu hätte dazu gesagt: "Gott ist der schweigende Partner bei allen großen Unternehmungen."',
                'created_at' => '2017-09-14 23:09:45',
                'updated_at' => '2017-09-14 23:09:45',
            ),
            231 => 
            array (
                'id' => 732,
                'user_id' => 11,
                'photo_id' => 262,
                'body' => 'Dalai Lama hätte dazu gesagt: "Es wäre dumm, sich über die Außenwelt zu ärgern. Sie kümmert sich nicht darum."',
                'created_at' => '2017-09-09 12:52:15',
                'updated_at' => '2017-09-09 12:52:15',
            ),
            232 => 
            array (
                'id' => 733,
                'user_id' => 159,
                'photo_id' => 78,
                'body' => 'Walt Disney hätte dazu gesagt: "Mit jedem Tag des Älterwerdens, befürchte ich genauso zu werden wie alle Menschen."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            233 => 
            array (
                'id' => 734,
                'user_id' => 116,
                'photo_id' => 95,
                'body' => 'Peter Sellers hätte dazu gesagt: "Alkohol macht nicht nur viele Menschen unverträglich, er reduziert zum Glück auch die Anzahl der Unverträglichen."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            234 => 
            array (
                'id' => 735,
                'user_id' => 100,
                'photo_id' => 172,
                'body' => 'Barack Obama hätte dazu gesagt: "Ich will den Namen Gottes loben mit einem Lied."',
                'created_at' => '2017-09-12 13:57:54',
                'updated_at' => '2017-09-12 13:57:54',
            ),
            235 => 
            array (
                'id' => 736,
                'user_id' => 176,
                'photo_id' => 507,
                'body' => 'Malcolm X hätte dazu gesagt: "Im Kriege verlieren alle, auch die Sieger."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            236 => 
            array (
                'id' => 737,
                'user_id' => 128,
                'photo_id' => 659,
                'body' => 'J.K.Rowling hätte dazu gesagt: "Zum Empfangen und Geben ist der Mensch geschaffen, zu Wirksamkeit und Freude, zum Tun und zum Leiden."',
                'created_at' => '2017-09-20 06:53:41',
                'updated_at' => '2017-09-20 06:53:41',
            ),
            237 => 
            array (
                'id' => 738,
                'user_id' => 122,
                'photo_id' => 323,
                'body' => 'Richard Branson hätte dazu gesagt: "Die Zeit ist ein großer Lehrer. Das Unglück: Sie tötet ihre Schüler."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            238 => 
            array (
                'id' => 739,
                'user_id' => 116,
                'photo_id' => 30,
                'body' => 'Pele hätte dazu gesagt: "Vergangenes Leid muß Wohlsein fühlen lehren. Wer nie gedarbt, ist ohne Freude reich."',
                'created_at' => '2017-09-14 13:01:19',
                'updated_at' => '2017-09-14 13:01:19',
            ),
            239 => 
            array (
                'id' => 740,
                'user_id' => 146,
                'photo_id' => 646,
                'body' => 'Angelina Jolie hätte dazu gesagt: "Die Natur ist ein Verschwender, der keine Kosten und Mühen scheut, um sein Werk in kürzester Zeit zu vollenden."',
                'created_at' => '2017-09-02 11:19:36',
                'updated_at' => '2017-09-02 11:19:36',
            ),
            240 => 
            array (
                'id' => 741,
                'user_id' => 72,
                'photo_id' => 455,
                'body' => 'Jesse Owens hätte dazu gesagt: "Gilt es zu hören, sei der Erste. Sei der Letzte, wenn es zu reden gilt."',
                'created_at' => '2017-09-08 05:31:16',
                'updated_at' => '2017-09-08 05:31:16',
            ),
            241 => 
            array (
                'id' => 742,
                'user_id' => 143,
                'photo_id' => 166,
                'body' => 'Ernest Hemingway hätte dazu gesagt: "Der innere Friede hängt immer vom Menschen selbst ab: Der Mensch braucht zu seinem Glück im wahren Verstande nichts als ihn, und braucht, um ihn zu besitzen, nichts als sich."',
                'created_at' => '2017-09-10 10:45:27',
                'updated_at' => '2017-09-10 10:45:27',
            ),
            242 => 
            array (
                'id' => 743,
                'user_id' => 134,
                'photo_id' => 516,
                'body' => 'John Lennon hätte dazu gesagt: "Man kann nicht dem Arbeitnehmer helfen, indem man den Arbeitgeber beseitigt."',
                'created_at' => '2017-09-15 09:18:29',
                'updated_at' => '2017-09-15 09:18:29',
            ),
            243 => 
            array (
                'id' => 744,
                'user_id' => 167,
                'photo_id' => 347,
                'body' => 'Henry Ford hätte dazu gesagt: "Wußten Sie schon, daß gerade ältere Herren junges Gemüse besonders schätzen?"',
                'created_at' => '2017-09-15 00:30:36',
                'updated_at' => '2017-09-15 00:30:36',
            ),
            244 => 
            array (
                'id' => 745,
                'user_id' => 132,
                'photo_id' => 669,
                'body' => 'Haile Selassie hätte dazu gesagt: "Jesus sagte: Steh auf, nimm deine Bahre und geh! Sofort wurde der Mann gesund, nahm seine Bahre und ging."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            245 => 
            array (
                'id' => 746,
                'user_id' => 151,
                'photo_id' => 128,
                'body' => 'Joseph Stalin hätte dazu gesagt: "Das Gefallen am Schönen und die Macht der Liebe sind etwas Natürliches, weder befohlen noch verboten, denn die Herzen stehen in Gottes Hand, und er wendet sie."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            246 => 
            array (
                'id' => 747,
                'user_id' => 166,
                'photo_id' => 490,
                'body' => 'Lord Baden Powell hätte dazu gesagt: "Gut ist eine lange Wurst und eine kurze Predigt."',
                'created_at' => '2017-09-06 19:06:40',
                'updated_at' => '2017-09-06 19:06:40',
            ),
            247 => 
            array (
                'id' => 748,
                'user_id' => 168,
                'photo_id' => 533,
                'body' => 'Michael Jordon hätte dazu gesagt: "Wir sind nicht, wofür wir uns oft halten, doch wir sind viel mehr, als die meisten von uns ahnen."',
                'created_at' => '2017-09-02 22:52:21',
                'updated_at' => '2017-09-02 22:52:21',
            ),
            248 => 
            array (
                'id' => 749,
                'user_id' => 163,
                'photo_id' => 204,
                'body' => 'V.Lenin hätte dazu gesagt: "Mäßige deinen Zorn; es fallen die Funken erst auf dich; auf den Feind, wenn sie je treffen, zuletzt."',
                'created_at' => '2017-08-27 15:46:43',
                'updated_at' => '2017-08-27 15:46:43',
            ),
            249 => 
            array (
                'id' => 750,
                'user_id' => 184,
                'photo_id' => 636,
                'body' => 'Ingrid Bergman hätte dazu gesagt: "Unter Umständen ist es für manches Kind am besten, wenn es gar nicht erzogen wird."',
                'created_at' => '2017-09-12 06:10:31',
                'updated_at' => '2017-09-12 06:10:31',
            ),
            250 => 
            array (
                'id' => 751,
                'user_id' => 1,
                'photo_id' => 605,
                'body' => 'Fidel Castro hätte dazu gesagt: "Nirgends zeigt sich der Mensch empfindlicher als in seinem Egoismus, und durch nichts ist er leichter zu besiegen als durch ihn."',
                'created_at' => '2017-09-07 11:15:40',
                'updated_at' => '2017-09-07 11:15:40',
            ),
            251 => 
            array (
                'id' => 752,
                'user_id' => 72,
                'photo_id' => 682,
                'body' => 'Oscar Wilde hätte dazu gesagt: "Ein guter Nachbar ist besser als viele böse Verwandten."',
                'created_at' => '2017-09-18 12:59:58',
                'updated_at' => '2017-09-18 12:59:58',
            ),
            252 => 
            array (
                'id' => 753,
                'user_id' => 140,
                'photo_id' => 695,
                'body' => 'Coco Chanel hätte dazu gesagt: "Es regnet auf alle Dächer."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            253 => 
            array (
                'id' => 754,
                'user_id' => 89,
                'photo_id' => 292,
                'body' => 'Pope Francis hätte dazu gesagt: "Was man heute politische Ansichten nennt, ist meist nur der Ausdruck wirtschaftlicher und sozialer Interessen."',
                'created_at' => '2017-09-09 03:53:23',
                'updated_at' => '2017-09-09 03:53:23',
            ),
            254 => 
            array (
                'id' => 755,
                'user_id' => 171,
                'photo_id' => 58,
                'body' => 'Amelia Earhart hätte dazu gesagt: "Und dann war da noch die Frustrierte, die sagte: "Ich habe nie bekommen, was ich wollte. Ich wollte, ich hätte das bekommen, was ich wollte. Aber nicht einmal das will ich."',
                'created_at' => '2017-09-09 14:02:21',
                'updated_at' => '2017-09-09 14:02:21',
            ),
            255 => 
            array (
                'id' => 756,
                'user_id' => 177,
                'photo_id' => 140,
                'body' => 'Adolf Hitler hätte dazu gesagt: "In dem ehelichen Leben soll das vereinigte Paar gleichsam eine einzige moralische Person ausmachen, welche durch den Verstand des Mannes und den Geschmack der Frauen belebt und regiert wird."',
                'created_at' => '2017-09-12 19:45:47',
                'updated_at' => '2017-09-12 19:45:47',
            ),
            256 => 
            array (
                'id' => 757,
                'user_id' => 190,
                'photo_id' => 556,
                'body' => 'Sting hätte dazu gesagt: "Nichts ist schwerer zu ertragen als Reißverschluß auf vollen Magen."',
                'created_at' => '2017-09-07 05:40:22',
                'updated_at' => '2017-09-07 05:40:22',
            ),
            257 => 
            array (
                'id' => 758,
                'user_id' => 62,
                'photo_id' => 48,
                'body' => 'Mary Magdalene hätte dazu gesagt: "Das Gewissen ist der Puls der Vernunft."',
                'created_at' => '2017-09-09 14:09:25',
                'updated_at' => '2017-09-09 14:09:25',
            ),
            258 => 
            array (
                'id' => 759,
                'user_id' => 37,
                'photo_id' => 96,
                'body' => 'Alfred Hitchcock hätte dazu gesagt: "Wer mit dem Kopf durch die Wand will, holt sich nur Beulen."',
                'created_at' => '2017-09-07 04:04:47',
                'updated_at' => '2017-09-07 04:04:47',
            ),
            259 => 
            array (
                'id' => 760,
                'user_id' => 41,
                'photo_id' => 220,
                'body' => 'Michael Jackson hätte dazu gesagt: "Nur ein Tor zertrümmert den Spiegel, wenn ihm das Spiegelbild mißfällt."',
                'created_at' => '2017-09-13 06:23:31',
                'updated_at' => '2017-09-13 06:23:31',
            ),
            260 => 
            array (
                'id' => 761,
                'user_id' => 31,
                'photo_id' => 112,
                'body' => 'Madonna hätte dazu gesagt: "Faulheit, Frauendienst, Kränklichkeit, zu große Anhänglichkeit an den Geburtsort, Genügsamkeit und Furchtsamkeit, diese sind sechs Hindernisse der Größe."',
                'created_at' => '2017-09-03 18:51:15',
                'updated_at' => '2017-09-03 18:51:15',
            ),
            261 => 
            array (
                'id' => 762,
                'user_id' => 183,
                'photo_id' => 602,
                'body' => 'Mata Hari hätte dazu gesagt: "Laß euch nicht mit falschen Göttern ein!"',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            262 => 
            array (
                'id' => 763,
                'user_id' => 14,
                'photo_id' => 393,
                'body' => 'Cleopatra hätte dazu gesagt: "Wer sich entschieden hat, etwas zu tun, und an nichts anderes denkt, überwindet alle Hindernisse."',
                'created_at' => '2017-09-21 17:27:27',
                'updated_at' => '2017-09-21 17:27:27',
            ),
            263 => 
            array (
                'id' => 764,
                'user_id' => 173,
                'photo_id' => 325,
                'body' => 'Grace Kelly hätte dazu gesagt: "Würden die Pforten der Wahrnehmung gereinigt, erschiene den Menschen alles, wie es ist: unendlich."',
                'created_at' => '2017-08-27 00:44:31',
                'updated_at' => '2017-08-27 00:44:31',
            ),
            264 => 
            array (
                'id' => 765,
                'user_id' => 149,
                'photo_id' => 261,
                'body' => 'Steve Jobs hätte dazu gesagt: "Es gibt nicht nur einen bunten Hund in der Welt."',
                'created_at' => '2017-09-14 08:59:23',
                'updated_at' => '2017-09-14 08:59:23',
            ),
            265 => 
            array (
                'id' => 766,
                'user_id' => 125,
                'photo_id' => 625,
                'body' => 'Ronald Reagan hätte dazu gesagt: "Als Sklaven und Herren ihrer Eigenliebe leben die Menschen dahin, nicht um zu leben, sondern um andere glauben zu machen, sie hätten gelebt."',
                'created_at' => '2017-09-08 06:51:16',
                'updated_at' => '2017-09-08 06:51:16',
            ),
            266 => 
            array (
                'id' => 767,
                'user_id' => 164,
                'photo_id' => 136,
                'body' => 'Lionel Messi hätte dazu gesagt: "Du lebst nicht für dich allein auf Erden."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            267 => 
            array (
                'id' => 768,
                'user_id' => 129,
                'photo_id' => 200,
                'body' => 'Babe Ruth hätte dazu gesagt: "Was ist der Mensch, daß du seiner gedenkst?"',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            268 => 
            array (
                'id' => 769,
                'user_id' => 131,
                'photo_id' => 650,
                'body' => 'Bob Geldof hätte dazu gesagt: "Solange die Menschen sterben können und das Leben lieben, wird der Arzt verspottet und gut bezahlt werden."',
                'created_at' => '2017-09-23 07:11:20',
                'updated_at' => '2017-09-23 07:11:20',
            ),
            269 => 
            array (
                'id' => 770,
                'user_id' => 44,
                'photo_id' => 682,
                'body' => 'Roger Federer hätte dazu gesagt: "Gastsein ist gut. Heimkommen ist besser."',
                'created_at' => '2017-09-04 01:31:30',
                'updated_at' => '2017-09-04 01:31:30',
            ),
            270 => 
            array (
                'id' => 771,
                'user_id' => 156,
                'photo_id' => 409,
                'body' => 'Sigmund Freud hätte dazu gesagt: "Wer die Vergangenheit preist, tadelt die Gegenwart."',
                'created_at' => '2017-09-16 22:35:28',
                'updated_at' => '2017-09-16 22:35:28',
            ),
            271 => 
            array (
                'id' => 772,
                'user_id' => 6,
                'photo_id' => 312,
                'body' => 'Woodrow Wilson hätte dazu gesagt: "Beten heißt, liebend an Jesus denken."',
                'created_at' => '2017-08-25 08:18:23',
                'updated_at' => '2017-08-25 08:18:23',
            ),
            272 => 
            array (
                'id' => 773,
                'user_id' => 106,
                'photo_id' => 62,
                'body' => 'Mao Zedong hätte dazu gesagt: "Ich bin nicht entmutigt, weil jeder als falsch verworfene Versuch ein weiterer Schritt vorwärts ist."',
                'created_at' => '2017-09-14 23:09:46',
                'updated_at' => '2017-09-14 23:09:46',
            ),
            273 => 
            array (
                'id' => 774,
                'user_id' => 82,
                'photo_id' => 294,
                'body' => 'Katherine Hepburn hätte dazu gesagt: "Doppelt lebt, wer auch Vergangenes genießt."',
                'created_at' => '2017-09-09 12:52:16',
                'updated_at' => '2017-09-09 12:52:16',
            ),
            274 => 
            array (
                'id' => 775,
                'user_id' => 191,
                'photo_id' => 304,
                'body' => 'Audrey Hepburn hätte dazu gesagt: "Der Busch hat Augen, der Baumstumpf trägt einen Hut."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            275 => 
            array (
                'id' => 776,
                'user_id' => 41,
                'photo_id' => 476,
                'body' => 'David Beckham hätte dazu gesagt: "Die Nacht ist die Mutter von Gedanken."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            276 => 
            array (
                'id' => 777,
                'user_id' => 111,
                'photo_id' => 501,
                'body' => 'Usain Bolt hätte dazu gesagt: "Das Leben ist eine große Gelegenheit, und es ist sehr schade, wenn der Mensch das erst zu spät erkennt."',
                'created_at' => '2017-09-12 13:57:55',
                'updated_at' => '2017-09-12 13:57:55',
            ),
            277 => 
            array (
                'id' => 778,
                'user_id' => 131,
                'photo_id' => 460,
                'body' => 'Carl Lewis hätte dazu gesagt: "Herr, ich rufe zu dir. Eile mir zur Hilfe; höre auf meine Stimme, wenn ich zu dir rufe."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            278 => 
            array (
                'id' => 779,
                'user_id' => 144,
                'photo_id' => 331,
                'body' => 'Prince Charles hätte dazu gesagt: "Seit zehn Jahren versuchen viele Ostdeutsche möglichst schnell Wessis zu werden. Natürlich ohne ihre Identität dabei aufzugeben. Hundertprozentig ist das jedoch nur ganz wenigen gelungen. Aber immerhin gibt es inzwischen',
                'created_at' => '2017-09-20 06:53:42',
                'updated_at' => '2017-09-20 06:53:42',
            ),
            279 => 
            array (
                'id' => 780,
                'user_id' => 6,
                'photo_id' => 425,
                'body' => 'Jacqueline Kennedy Onassis hätte dazu gesagt: "Verlaßt euch nicht auf Gewalt!"',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            280 => 
            array (
                'id' => 781,
                'user_id' => 11,
                'photo_id' => 263,
                'body' => 'C.S. Lewis hätte dazu gesagt: "Ermuntert einander mit Psalmen und Lobgesängen und geistlichen Liedern, singt und spielt dem Herrn in euren Herzen."',
                'created_at' => '2017-09-14 13:01:20',
                'updated_at' => '2017-09-14 13:01:20',
            ),
            281 => 
            array (
                'id' => 782,
                'user_id' => 145,
                'photo_id' => 622,
                'body' => 'Billie Holiday hätte dazu gesagt: "Das einzige Mittel, den Irrtum zu vermeiden, ist die Unwissenheit."',
                'created_at' => '2017-09-02 11:19:37',
                'updated_at' => '2017-09-02 11:19:37',
            ),
            282 => 
            array (
                'id' => 783,
                'user_id' => 176,
                'photo_id' => 644,
                'body' => 'J.R.R. Tolkien hätte dazu gesagt: "Willst du fremde Fehler zählen, heb an deinen an zu zählen. Ist mir recht, wird dir die Weile zu den fremden Fehlern fehlen."',
                'created_at' => '2017-09-08 05:31:17',
                'updated_at' => '2017-09-08 05:31:17',
            ),
            283 => 
            array (
                'id' => 784,
                'user_id' => 143,
                'photo_id' => 594,
                'body' => 'Billie Jean King hätte dazu gesagt: "Trau niemals einem Menschen, der sich die Haare färbt. Er färbt auch seine Gefühle."',
                'created_at' => '2017-09-10 10:45:28',
                'updated_at' => '2017-09-10 10:45:28',
            ),
            284 => 
            array (
                'id' => 785,
                'user_id' => 67,
                'photo_id' => 81,
                'body' => 'Anne Frank hätte dazu gesagt: "Treibt uns der Ehrgeiz zur Einsamkeit? Die Antwort muß lauten: Ja! Denn was ist ihm mehr zuwider als Gemeinsamkeit? Was ist ihm wichtiger als Bewegungsfreiheit?"',
                'created_at' => '2017-09-15 09:18:30',
                'updated_at' => '2017-09-15 09:18:30',
            ),
            285 => 
            array (
                'id' => 786,
                'user_id' => 166,
                'photo_id' => 588,
                'body' => 'Simon Bolivar hätte dazu gesagt: "Was ein Leben an Länge gewinnt, verliert es meist an Tiefe."',
                'created_at' => '2017-09-15 00:30:37',
                'updated_at' => '2017-09-15 00:30:37',
            ),
            286 => 
            array (
                'id' => 787,
                'user_id' => 130,
                'photo_id' => 412,
                'body' => 'Marie Antoinette hätte dazu gesagt: "Die Vergangenheit und die Erinnerung haben eine unendliche Kraft, und wenn auch schmerzliche Sehnsucht daraus quillt, sich ihnen hinzugeben, so liegt darin doch ein unaussprechlich süßer Genuß."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            287 => 
            array (
                'id' => 788,
                'user_id' => 34,
                'photo_id' => 421,
                'body' => 'Christiano Ronaldo hätte dazu gesagt: "Im Wald lehnt sich Baum an Baum, also warum nicht Mensch an Mensch?"',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            288 => 
            array (
                'id' => 789,
                'user_id' => 187,
                'photo_id' => 160,
                'body' => 'Emmeline Pankhurst hätte dazu gesagt: "Nur der, der gar nichts tut, macht einen Fehler."',
                'created_at' => '2017-09-06 19:06:41',
                'updated_at' => '2017-09-06 19:06:41',
            ),
            289 => 
            array (
                'id' => 790,
                'user_id' => 177,
                'photo_id' => 521,
                'body' => 'Emile Zatopek hätte dazu gesagt: "Wer sich getroffen fühlt, ist gemeint."',
                'created_at' => '2017-09-02 22:52:22',
                'updated_at' => '2017-09-02 22:52:22',
            ),
            290 => 
            array (
                'id' => 791,
                'user_id' => 34,
                'photo_id' => 108,
                'body' => 'Lech Walesa hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-08-27 15:46:44',
                'updated_at' => '2017-08-27 15:46:44',
            ),
            291 => 
            array (
                'id' => 792,
                'user_id' => 113,
                'photo_id' => 425,
                'body' => 'Julie Andrews hätte dazu gesagt: "Bin, der mich sagen hört, »umsonst« – heißt »gratis«, doch auch »vergeblich« –, Gnade wie Nichtigkeit gleichermaßen."',
                'created_at' => '2017-09-12 06:10:32',
                'updated_at' => '2017-09-12 06:10:32',
            ),
            292 => 
            array (
                'id' => 793,
                'user_id' => 54,
                'photo_id' => 179,
                'body' => 'Florence Nightingale hätte dazu gesagt: "Sein Leid in sich fressen."',
                'created_at' => '2017-09-07 11:15:41',
                'updated_at' => '2017-09-07 11:15:41',
            ),
            293 => 
            array (
                'id' => 794,
                'user_id' => 144,
                'photo_id' => 586,
                'body' => 'Marie Curie hätte dazu gesagt: "Solang ein Weib liebt, liebt es in einem fort – ein Mann hat dazwischen zu tun."',
                'created_at' => '2017-09-18 12:59:59',
                'updated_at' => '2017-09-18 12:59:59',
            ),
            294 => 
            array (
                'id' => 795,
                'user_id' => 104,
                'photo_id' => 673,
                'body' => 'Stephen Hawking hätte dazu gesagt: "Mit Fristgeben gedeiht der Handel."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            295 => 
            array (
                'id' => 796,
                'user_id' => 43,
                'photo_id' => 612,
                'body' => 'Tim Berners Lee hätte dazu gesagt: "Flausen im Kopf sorgen für die Federung des Denkapparates."',
                'created_at' => '2017-09-09 03:53:24',
                'updated_at' => '2017-09-09 03:53:24',
            ),
            296 => 
            array (
                'id' => 797,
                'user_id' => 173,
                'photo_id' => 17,
                'body' => 'Lance Armstrong hätte dazu gesagt: "Wer sich nicht schämt, etwas nicht zu können, und sich nicht ärgert, etwas nicht zu können, der kommt voran."',
                'created_at' => '2017-09-09 14:02:22',
                'updated_at' => '2017-09-09 14:02:22',
            ),
            297 => 
            array (
                'id' => 798,
                'user_id' => 144,
                'photo_id' => 316,
                'body' => 'Shakira hätte dazu gesagt: "Werden die Eisheiligen im Hundertjährigen Eskimo-Kalender als heiße Jungs aufgeführt?"',
                'created_at' => '2017-09-12 19:45:48',
                'updated_at' => '2017-09-12 19:45:48',
            ),
            298 => 
            array (
                'id' => 799,
                'user_id' => 107,
                'photo_id' => 28,
                'body' => 'Jon Stewart hätte dazu gesagt: "Viele verabschieden sich von dieser Welt, ohne jemals etwas gesagt zu haben."',
                'created_at' => '2017-09-07 05:40:23',
                'updated_at' => '2017-09-07 05:40:23',
            ),
            299 => 
            array (
                'id' => 800,
                'user_id' => 61,
                'photo_id' => 411,
                'body' => 'Wright Brothers hätte dazu gesagt: "Es ist weise, das Glück wahrzunehmen, das unser Herrgott einem zuschickt."',
                'created_at' => '2017-09-09 14:09:26',
                'updated_at' => '2017-09-09 14:09:26',
            ),
            300 => 
            array (
                'id' => 801,
                'user_id' => 163,
                'photo_id' => 243,
                'body' => 'Paul Krugman hätte dazu gesagt: "Rache ist teuer."',
                'created_at' => '2017-09-07 04:04:48',
                'updated_at' => '2017-09-07 04:04:48',
            ),
            301 => 
            array (
                'id' => 802,
                'user_id' => 166,
                'photo_id' => 34,
                'body' => 'Malala Yousafzai hätte dazu gesagt: "Die Macht ist bei den Fröhlichen."',
                'created_at' => '2017-09-13 06:23:32',
                'updated_at' => '2017-09-13 06:23:32',
            ),
            302 => 
            array (
                'id' => 803,
                'user_id' => 86,
                'photo_id' => 440,
                'body' => 'Marilyn Monroe hätte dazu gesagt: "Wenn du ein Geheimnis nicht bewahren willst, dann sag es einer Frau."',
                'created_at' => '2017-09-03 18:51:16',
                'updated_at' => '2017-09-03 18:51:16',
            ),
            303 => 
            array (
                'id' => 804,
                'user_id' => 167,
                'photo_id' => 244,
                'body' => 'Abraham Lincoln hätte dazu gesagt: "Wenn man nichts hat, was man liebt, muß man lieben, was man hat."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            304 => 
            array (
                'id' => 805,
                'user_id' => 50,
                'photo_id' => 541,
                'body' => 'Mother Teresa hätte dazu gesagt: "Ein guter Anfang ist ein halber Erfolg."',
                'created_at' => '2017-09-21 17:27:28',
                'updated_at' => '2017-09-21 17:27:28',
            ),
            305 => 
            array (
                'id' => 806,
                'user_id' => 133,
                'photo_id' => 270,
                'body' => 'John F. Kennedy hätte dazu gesagt: "Popularität hat für mich immer etwas Unbehagliches."',
                'created_at' => '2017-08-27 00:44:32',
                'updated_at' => '2017-08-27 00:44:32',
            ),
            306 => 
            array (
                'id' => 807,
                'user_id' => 192,
                'photo_id' => 36,
                'body' => 'Martin Luther King hätte dazu gesagt: "Die Ehre ist die Poesie der Pflicht!"',
                'created_at' => '2017-09-14 08:59:24',
                'updated_at' => '2017-09-14 08:59:24',
            ),
            307 => 
            array (
                'id' => 808,
                'user_id' => 179,
                'photo_id' => 486,
                'body' => 'Nelson Mandela hätte dazu gesagt: "Ein Mensch ohne Geld ist wie ein Wolf ohne Zähne."',
                'created_at' => '2017-09-08 06:51:17',
                'updated_at' => '2017-09-08 06:51:17',
            ),
            308 => 
            array (
                'id' => 809,
                'user_id' => 2,
                'photo_id' => 376,
                'body' => 'Winston Churchill hätte dazu gesagt: "Es ist irrelevant, wie lange sich die Dummköpfe unter dem Baum der Weisheit und Barmherzigkeit aufhalten. Für sie wird kein einziger Apfel herunter fallen."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            309 => 
            array (
                'id' => 810,
                'user_id' => 92,
                'photo_id' => 102,
                'body' => 'Bill Gates hätte dazu gesagt: "Christus und Moses, alle Seher und Magier waren "in der Ruhe". Martha arbeitete sich ab - Maria baute sich auf. Darum sagte Christus von Maria, sie habe das bessere Teil erwählt, da sie sich nicht zur Hausmagd erniedrigte gl',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            310 => 
            array (
                'id' => 811,
                'user_id' => 41,
                'photo_id' => 664,
                'body' => 'Muhammad Ali hätte dazu gesagt: "Wo du zu tadeln hast, komm und hilf!"',
                'created_at' => '2017-09-23 07:11:21',
                'updated_at' => '2017-09-23 07:11:21',
            ),
            311 => 
            array (
                'id' => 812,
                'user_id' => 184,
                'photo_id' => 219,
                'body' => 'Mahatma Gandhi hätte dazu gesagt: "Lebendig ist das Wort Gottes, kraftvoll und schärfer als jedes zweischneidige Schwert."',
                'created_at' => '2017-09-04 01:31:31',
                'updated_at' => '2017-09-04 01:31:31',
            ),
            312 => 
            array (
                'id' => 813,
                'user_id' => 97,
                'photo_id' => 137,
                'body' => 'Margaret Thatcher hätte dazu gesagt: "Wer niemals außer sich gerät, wird niemals in sich gehen."',
                'created_at' => '2017-09-16 22:35:29',
                'updated_at' => '2017-09-16 22:35:29',
            ),
            313 => 
            array (
                'id' => 814,
                'user_id' => 185,
                'photo_id' => 562,
                'body' => 'Charles de Gaulle hätte dazu gesagt: "Wer nicht läuft, gelangt nie ans Ziel!"',
                'created_at' => '2017-08-25 08:18:24',
                'updated_at' => '2017-08-25 08:18:24',
            ),
            314 => 
            array (
                'id' => 815,
                'user_id' => 94,
                'photo_id' => 285,
                'body' => 'Christopher Columbus hätte dazu gesagt: "Machen Sie es sich zur Aufgabe, höheren Ansprüchen zu genügen, als andere an Sie stellen."',
                'created_at' => '2017-09-14 23:09:47',
                'updated_at' => '2017-09-14 23:09:47',
            ),
            315 => 
            array (
                'id' => 816,
                'user_id' => 14,
                'photo_id' => 454,
                'body' => 'George Orwell hätte dazu gesagt: "Laß die anderen in Ruhe, sorge für dich selbst."',
                'created_at' => '2017-09-09 12:52:17',
                'updated_at' => '2017-09-09 12:52:17',
            ),
            316 => 
            array (
                'id' => 817,
                'user_id' => 92,
                'photo_id' => 663,
                'body' => 'Charles Darwin hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            317 => 
            array (
                'id' => 818,
                'user_id' => 150,
                'photo_id' => 322,
                'body' => 'Elvis Presley hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            318 => 
            array (
                'id' => 819,
                'user_id' => 162,
                'photo_id' => 129,
                'body' => 'Albert Einstein hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-12 13:57:56',
                'updated_at' => '2017-09-12 13:57:56',
            ),
            319 => 
            array (
                'id' => 820,
                'user_id' => 184,
                'photo_id' => 648,
                'body' => 'Paul McCartney hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            320 => 
            array (
                'id' => 821,
                'user_id' => 43,
                'photo_id' => 30,
                'body' => 'Plato hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-20 06:53:43',
                'updated_at' => '2017-09-20 06:53:43',
            ),
            321 => 
            array (
                'id' => 822,
                'user_id' => 130,
                'photo_id' => 22,
                'body' => 'Queen Elizabeth hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            322 => 
            array (
                'id' => 823,
                'user_id' => 29,
                'photo_id' => 476,
                'body' => 'Queen Victoria hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-14 13:01:21',
                'updated_at' => '2017-09-14 13:01:21',
            ),
            323 => 
            array (
                'id' => 824,
                'user_id' => 132,
                'photo_id' => 158,
                'body' => 'John M Keynes hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-02 11:19:38',
                'updated_at' => '2017-09-02 11:19:38',
            ),
            324 => 
            array (
                'id' => 825,
                'user_id' => 75,
                'photo_id' => 364,
                'body' => 'Mikhail Gorbachev hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-08 05:31:18',
                'updated_at' => '2017-09-08 05:31:18',
            ),
            325 => 
            array (
                'id' => 826,
                'user_id' => 48,
                'photo_id' => 28,
                'body' => 'Jawaharlal Nehru hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-10 10:45:29',
                'updated_at' => '2017-09-10 10:45:29',
            ),
            326 => 
            array (
                'id' => 827,
                'user_id' => 117,
                'photo_id' => 282,
                'body' => 'Leonardo da Vinci hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 09:18:31',
                'updated_at' => '2017-09-15 09:18:31',
            ),
            327 => 
            array (
                'id' => 828,
                'user_id' => 157,
                'photo_id' => 263,
                'body' => 'Louis Pasteur hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 00:30:38',
                'updated_at' => '2017-09-15 00:30:38',
            ),
            328 => 
            array (
                'id' => 829,
                'user_id' => 10,
                'photo_id' => 443,
                'body' => 'Leo Tolstoy hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            329 => 
            array (
                'id' => 830,
                'user_id' => 168,
                'photo_id' => 428,
                'body' => 'Pablo Picasso hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            330 => 
            array (
                'id' => 831,
                'user_id' => 114,
                'photo_id' => 494,
                'body' => 'Vincent Van Gogh hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-06 19:06:42',
                'updated_at' => '2017-09-06 19:06:42',
            ),
            331 => 
            array (
                'id' => 832,
                'user_id' => 158,
                'photo_id' => 546,
                'body' => 'Franklin D. Roosevelt hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-02 22:52:23',
                'updated_at' => '2017-09-02 22:52:23',
            ),
            332 => 
            array (
                'id' => 833,
                'user_id' => 85,
                'photo_id' => 445,
                'body' => 'Pope John Paul II hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-08-27 15:46:45',
                'updated_at' => '2017-08-27 15:46:45',
            ),
            333 => 
            array (
                'id' => 834,
                'user_id' => 138,
                'photo_id' => 192,
                'body' => 'Thomas Edison hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-12 06:10:33',
                'updated_at' => '2017-09-12 06:10:33',
            ),
            334 => 
            array (
                'id' => 835,
                'user_id' => 29,
                'photo_id' => 185,
                'body' => 'Rosa Parks hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-07 11:15:42',
                'updated_at' => '2017-09-07 11:15:42',
            ),
            335 => 
            array (
                'id' => 836,
                'user_id' => 103,
                'photo_id' => 571,
                'body' => 'Aung San Suu Kyi hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            336 => 
            array (
                'id' => 837,
                'user_id' => 148,
                'photo_id' => 272,
                'body' => 'Lyndon Johnson hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            337 => 
            array (
                'id' => 838,
                'user_id' => 162,
                'photo_id' => 657,
                'body' => 'Ludwig Beethoven hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-09 03:53:25',
                'updated_at' => '2017-09-09 03:53:25',
            ),
            338 => 
            array (
                'id' => 839,
                'user_id' => 52,
                'photo_id' => 689,
                'body' => 'Oprah Winfrey hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-09 14:02:23',
                'updated_at' => '2017-09-09 14:02:23',
            ),
            339 => 
            array (
                'id' => 840,
                'user_id' => 47,
                'photo_id' => 303,
                'body' => 'Indira Gandhi hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-12 19:45:49',
                'updated_at' => '2017-09-12 19:45:49',
            ),
            340 => 
            array (
                'id' => 841,
                'user_id' => 112,
                'photo_id' => 359,
                'body' => 'Eva Peron hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-07 05:40:24',
                'updated_at' => '2017-09-07 05:40:24',
            ),
            341 => 
            array (
                'id' => 842,
                'user_id' => 56,
                'photo_id' => 159,
                'body' => 'Benazir Bhutto hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-09 14:09:27',
                'updated_at' => '2017-09-09 14:09:27',
            ),
            342 => 
            array (
                'id' => 843,
                'user_id' => 113,
                'photo_id' => 66,
                'body' => 'Desmond Tutu hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-07 04:04:49',
                'updated_at' => '2017-09-07 04:04:49',
            ),
            343 => 
            array (
                'id' => 844,
                'user_id' => 38,
                'photo_id' => 309,
                'body' => 'Dalai Lama hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-13 06:23:33',
                'updated_at' => '2017-09-13 06:23:33',
            ),
            344 => 
            array (
                'id' => 845,
                'user_id' => 58,
                'photo_id' => 484,
                'body' => 'Walt Disney hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-03 18:51:17',
                'updated_at' => '2017-09-03 18:51:17',
            ),
            345 => 
            array (
                'id' => 846,
                'user_id' => 183,
                'photo_id' => 202,
                'body' => 'Peter Sellers hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            346 => 
            array (
                'id' => 847,
                'user_id' => 3,
                'photo_id' => 103,
                'body' => 'Barack Obama hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-21 17:27:29',
                'updated_at' => '2017-09-21 17:27:29',
            ),
            347 => 
            array (
                'id' => 848,
                'user_id' => 2,
                'photo_id' => 27,
                'body' => 'Malcolm X hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-08-27 00:44:33',
                'updated_at' => '2017-08-27 00:44:33',
            ),
            348 => 
            array (
                'id' => 849,
                'user_id' => 14,
                'photo_id' => 230,
                'body' => 'J.K.Rowling hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-14 08:59:25',
                'updated_at' => '2017-09-14 08:59:25',
            ),
            349 => 
            array (
                'id' => 850,
                'user_id' => 12,
                'photo_id' => 13,
                'body' => 'Richard Branson hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-08 06:51:18',
                'updated_at' => '2017-09-08 06:51:18',
            ),
            350 => 
            array (
                'id' => 851,
                'user_id' => 137,
                'photo_id' => 635,
                'body' => 'Pele hätte dazu gesagt: "Ich bin so aufgeregt."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            351 => 
            array (
                'id' => 852,
                'user_id' => 60,
                'photo_id' => 506,
                'body' => 'Angelina Jolie hätte dazu gesagt: "Wo will man aber Weisheit finden, und wo ist die Stätte der Einsicht?"',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            352 => 
            array (
                'id' => 853,
                'user_id' => 32,
                'photo_id' => 36,
                'body' => 'Jesse Owens hätte dazu gesagt: "Bevor du sprichst, denke siebenmal darüber nach!"',
                'created_at' => '2017-09-23 07:11:22',
                'updated_at' => '2017-09-23 07:11:22',
            ),
            353 => 
            array (
                'id' => 854,
                'user_id' => 76,
                'photo_id' => 402,
                'body' => 'Ernest Hemingway hätte dazu gesagt: "Nichts ist einem Menschen willkommener als ein Freund zur rechten Zeit."',
                'created_at' => '2017-09-04 01:31:32',
                'updated_at' => '2017-09-04 01:31:32',
            ),
            354 => 
            array (
                'id' => 855,
                'user_id' => 111,
                'photo_id' => 389,
                'body' => 'John Lennon hätte dazu gesagt: "Das Alter ist eine Reisende der Nacht. die Erde verbirgt sich und der Himmel wird sichtbar."',
                'created_at' => '2017-09-16 22:35:30',
                'updated_at' => '2017-09-16 22:35:30',
            ),
            355 => 
            array (
                'id' => 856,
                'user_id' => 113,
                'photo_id' => 104,
                'body' => 'Henry Ford hätte dazu gesagt: "Wer den anderen liebt, hat das Gesetz erfüllt."',
                'created_at' => '2017-08-25 08:18:25',
                'updated_at' => '2017-08-25 08:18:25',
            ),
            356 => 
            array (
                'id' => 857,
                'user_id' => 9,
                'photo_id' => 140,
                'body' => 'Haile Selassie hätte dazu gesagt: "Offene Hände schenken mehr als saubere Finger."',
                'created_at' => '2017-09-14 23:09:48',
                'updated_at' => '2017-09-14 23:09:48',
            ),
            357 => 
            array (
                'id' => 858,
                'user_id' => 46,
                'photo_id' => 608,
                'body' => 'Joseph Stalin hätte dazu gesagt: "Wer heile Hände hat, dem tut das Gift nichts an; Das Böse schadet nicht dem, der es nicht getan."',
                'created_at' => '2017-09-09 12:52:18',
                'updated_at' => '2017-09-09 12:52:18',
            ),
            358 => 
            array (
                'id' => 859,
                'user_id' => 64,
                'photo_id' => 217,
                'body' => 'Lord Baden Powell hätte dazu gesagt: "Kummer verdaut man am besten, wenn man ihn in Wein auflöst."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            359 => 
            array (
                'id' => 860,
                'user_id' => 23,
                'photo_id' => 644,
                'body' => 'Michael Jordon hätte dazu gesagt: "Die Kunst der Weisheit besteht darin, zu wissen, was man übersehen muß."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            360 => 
            array (
                'id' => 861,
                'user_id' => 166,
                'photo_id' => 563,
                'body' => 'V.Lenin hätte dazu gesagt: "Grenzen der Technik: Ein Tauchsieder kocht auch nur mit Wasser."',
                'created_at' => '2017-09-12 13:57:57',
                'updated_at' => '2017-09-12 13:57:57',
            ),
            361 => 
            array (
                'id' => 862,
                'user_id' => 193,
                'photo_id' => 155,
                'body' => 'Ingrid Bergman hätte dazu gesagt: "Ein Haus wird gebaut, aber ein Zuhause wird geformt."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            362 => 
            array (
                'id' => 863,
                'user_id' => 115,
                'photo_id' => 352,
                'body' => 'Fidel Castro hätte dazu gesagt: "Bemerke, höre, schweige. Urteile wenig, frage viel."',
                'created_at' => '2017-09-20 06:53:44',
                'updated_at' => '2017-09-20 06:53:44',
            ),
            363 => 
            array (
                'id' => 864,
                'user_id' => 123,
                'photo_id' => 159,
                'body' => 'Oscar Wilde hätte dazu gesagt: "Es ist eine viel schlimmere Art des Stolzes, andere zu verkleinern, als sich selbst zu erheben."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            364 => 
            array (
                'id' => 865,
                'user_id' => 129,
                'photo_id' => 173,
                'body' => 'Coco Chanel hätte dazu gesagt: "In den Bau der Welt taugt nur der abgeschliffene Stein."',
                'created_at' => '2017-09-14 13:01:22',
                'updated_at' => '2017-09-14 13:01:22',
            ),
            365 => 
            array (
                'id' => 866,
                'user_id' => 26,
                'photo_id' => 318,
                'body' => 'Pope Francis hätte dazu gesagt: "Doch schmecken muß man alles, heiß und kalt, wer jung kein Narr war, wird es, wenn er alt."',
                'created_at' => '2017-09-02 11:19:39',
                'updated_at' => '2017-09-02 11:19:39',
            ),
            366 => 
            array (
                'id' => 867,
                'user_id' => 82,
                'photo_id' => 14,
                'body' => 'Amelia Earhart hätte dazu gesagt: "Gott ist der schweigende Partner bei allen großen Unternehmungen."',
                'created_at' => '2017-09-08 05:31:19',
                'updated_at' => '2017-09-08 05:31:19',
            ),
            367 => 
            array (
                'id' => 868,
                'user_id' => 107,
                'photo_id' => 230,
                'body' => 'Adolf Hitler hätte dazu gesagt: "Es wäre dumm, sich über die Außenwelt zu ärgern. Sie kümmert sich nicht darum."',
                'created_at' => '2017-09-10 10:45:30',
                'updated_at' => '2017-09-10 10:45:30',
            ),
            368 => 
            array (
                'id' => 869,
                'user_id' => 109,
                'photo_id' => 274,
                'body' => 'Sting hätte dazu gesagt: "Mit jedem Tag des Älterwerdens, befürchte ich genauso zu werden wie alle Menschen."',
                'created_at' => '2017-09-15 09:18:32',
                'updated_at' => '2017-09-15 09:18:32',
            ),
            369 => 
            array (
                'id' => 870,
                'user_id' => 82,
                'photo_id' => 483,
                'body' => 'Mary Magdalene hätte dazu gesagt: "Alkohol macht nicht nur viele Menschen unverträglich, er reduziert zum Glück auch die Anzahl der Unverträglichen."',
                'created_at' => '2017-09-15 00:30:39',
                'updated_at' => '2017-09-15 00:30:39',
            ),
            370 => 
            array (
                'id' => 871,
                'user_id' => 126,
                'photo_id' => 273,
                'body' => 'Alfred Hitchcock hätte dazu gesagt: "Ich will den Namen Gottes loben mit einem Lied."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            371 => 
            array (
                'id' => 872,
                'user_id' => 86,
                'photo_id' => 71,
                'body' => 'Michael Jackson hätte dazu gesagt: "Im Kriege verlieren alle, auch die Sieger."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            372 => 
            array (
                'id' => 873,
                'user_id' => 53,
                'photo_id' => 407,
                'body' => 'Madonna hätte dazu gesagt: "Zum Empfangen und Geben ist der Mensch geschaffen, zu Wirksamkeit und Freude, zum Tun und zum Leiden."',
                'created_at' => '2017-09-06 19:06:43',
                'updated_at' => '2017-09-06 19:06:43',
            ),
            373 => 
            array (
                'id' => 874,
                'user_id' => 90,
                'photo_id' => 19,
                'body' => 'Mata Hari hätte dazu gesagt: "Die Zeit ist ein großer Lehrer. Das Unglück: Sie tötet ihre Schüler."',
                'created_at' => '2017-09-02 22:52:24',
                'updated_at' => '2017-09-02 22:52:24',
            ),
            374 => 
            array (
                'id' => 875,
                'user_id' => 83,
                'photo_id' => 195,
                'body' => 'Cleopatra hätte dazu gesagt: "Vergangenes Leid muß Wohlsein fühlen lehren. Wer nie gedarbt, ist ohne Freude reich."',
                'created_at' => '2017-08-27 15:46:46',
                'updated_at' => '2017-08-27 15:46:46',
            ),
            375 => 
            array (
                'id' => 876,
                'user_id' => 76,
                'photo_id' => 200,
                'body' => 'Grace Kelly hätte dazu gesagt: "Die Natur ist ein Verschwender, der keine Kosten und Mühen scheut, um sein Werk in kürzester Zeit zu vollenden."',
                'created_at' => '2017-09-12 06:10:34',
                'updated_at' => '2017-09-12 06:10:34',
            ),
            376 => 
            array (
                'id' => 877,
                'user_id' => 94,
                'photo_id' => 361,
                'body' => 'Steve Jobs hätte dazu gesagt: "Gilt es zu hören, sei der Erste. Sei der Letzte, wenn es zu reden gilt."',
                'created_at' => '2017-09-07 11:15:43',
                'updated_at' => '2017-09-07 11:15:43',
            ),
            377 => 
            array (
                'id' => 878,
                'user_id' => 169,
                'photo_id' => 308,
                'body' => 'Ronald Reagan hätte dazu gesagt: "Der innere Friede hängt immer vom Menschen selbst ab: Der Mensch braucht zu seinem Glück im wahren Verstande nichts als ihn, und braucht, um ihn zu besitzen, nichts als sich."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            378 => 
            array (
                'id' => 879,
                'user_id' => 45,
                'photo_id' => 271,
                'body' => 'Lionel Messi hätte dazu gesagt: "Man kann nicht dem Arbeitnehmer helfen, indem man den Arbeitgeber beseitigt."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            379 => 
            array (
                'id' => 880,
                'user_id' => 181,
                'photo_id' => 514,
                'body' => 'Babe Ruth hätte dazu gesagt: "Wußten Sie schon, daß gerade ältere Herren junges Gemüse besonders schätzen?"',
                'created_at' => '2017-09-09 03:53:26',
                'updated_at' => '2017-09-09 03:53:26',
            ),
            380 => 
            array (
                'id' => 881,
                'user_id' => 140,
                'photo_id' => 107,
                'body' => 'Bob Geldof hätte dazu gesagt: "Jesus sagte: Steh auf, nimm deine Bahre und geh! Sofort wurde der Mann gesund, nahm seine Bahre und ging."',
                'created_at' => '2017-09-09 14:02:24',
                'updated_at' => '2017-09-09 14:02:24',
            ),
            381 => 
            array (
                'id' => 882,
                'user_id' => 11,
                'photo_id' => 68,
                'body' => 'Roger Federer hätte dazu gesagt: "Das Gefallen am Schönen und die Macht der Liebe sind etwas Natürliches, weder befohlen noch verboten, denn die Herzen stehen in Gottes Hand, und er wendet sie."',
                'created_at' => '2017-09-12 19:45:50',
                'updated_at' => '2017-09-12 19:45:50',
            ),
            382 => 
            array (
                'id' => 883,
                'user_id' => 82,
                'photo_id' => 328,
                'body' => 'Sigmund Freud hätte dazu gesagt: "Gut ist eine lange Wurst und eine kurze Predigt."',
                'created_at' => '2017-09-07 05:40:25',
                'updated_at' => '2017-09-07 05:40:25',
            ),
            383 => 
            array (
                'id' => 884,
                'user_id' => 92,
                'photo_id' => 23,
                'body' => 'Woodrow Wilson hätte dazu gesagt: "Wir sind nicht, wofür wir uns oft halten, doch wir sind viel mehr, als die meisten von uns ahnen."',
                'created_at' => '2017-09-09 14:09:28',
                'updated_at' => '2017-09-09 14:09:28',
            ),
            384 => 
            array (
                'id' => 885,
                'user_id' => 55,
                'photo_id' => 470,
                'body' => 'Mao Zedong hätte dazu gesagt: "Mäßige deinen Zorn; es fallen die Funken erst auf dich; auf den Feind, wenn sie je treffen, zuletzt."',
                'created_at' => '2017-09-07 04:04:50',
                'updated_at' => '2017-09-07 04:04:50',
            ),
            385 => 
            array (
                'id' => 886,
                'user_id' => 76,
                'photo_id' => 646,
                'body' => 'Katherine Hepburn hätte dazu gesagt: "Unter Umständen ist es für manches Kind am besten, wenn es gar nicht erzogen wird."',
                'created_at' => '2017-09-13 06:23:34',
                'updated_at' => '2017-09-13 06:23:34',
            ),
            386 => 
            array (
                'id' => 887,
                'user_id' => 61,
                'photo_id' => 615,
                'body' => 'Audrey Hepburn hätte dazu gesagt: "Nirgends zeigt sich der Mensch empfindlicher als in seinem Egoismus, und durch nichts ist er leichter zu besiegen als durch ihn."',
                'created_at' => '2017-09-03 18:51:18',
                'updated_at' => '2017-09-03 18:51:18',
            ),
            387 => 
            array (
                'id' => 888,
                'user_id' => 148,
                'photo_id' => 608,
                'body' => 'David Beckham hätte dazu gesagt: "Ein guter Nachbar ist besser als viele böse Verwandten."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            388 => 
            array (
                'id' => 889,
                'user_id' => 131,
                'photo_id' => 122,
                'body' => 'Usain Bolt hätte dazu gesagt: "Es regnet auf alle Dächer."',
                'created_at' => '2017-09-21 17:27:30',
                'updated_at' => '2017-09-21 17:27:30',
            ),
            389 => 
            array (
                'id' => 890,
                'user_id' => 177,
                'photo_id' => 14,
                'body' => 'Carl Lewis hätte dazu gesagt: "Was man heute politische Ansichten nennt, ist meist nur der Ausdruck wirtschaftlicher und sozialer Interessen."',
                'created_at' => '2017-08-27 00:44:34',
                'updated_at' => '2017-08-27 00:44:34',
            ),
            390 => 
            array (
                'id' => 891,
                'user_id' => 71,
                'photo_id' => 239,
                'body' => 'Prince Charles hätte dazu gesagt: "Und dann war da noch die Frustrierte, die sagte: "Ich habe nie bekommen, was ich wollte. Ich wollte, ich hätte das bekommen, was ich wollte. Aber nicht einmal das will ich."',
                'created_at' => '2017-09-14 08:59:26',
                'updated_at' => '2017-09-14 08:59:26',
            ),
            391 => 
            array (
                'id' => 892,
                'user_id' => 87,
                'photo_id' => 301,
                'body' => 'Jacqueline Kennedy Onassis hätte dazu gesagt: "In dem ehelichen Leben soll das vereinigte Paar gleichsam eine einzige moralische Person ausmachen, welche durch den Verstand des Mannes und den Geschmack der Frauen belebt und regiert wird."',
                'created_at' => '2017-09-08 06:51:19',
                'updated_at' => '2017-09-08 06:51:19',
            ),
            392 => 
            array (
                'id' => 893,
                'user_id' => 45,
                'photo_id' => 155,
                'body' => 'C.S. Lewis hätte dazu gesagt: "Nichts ist schwerer zu ertragen als Reißverschluß auf vollen Magen."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            393 => 
            array (
                'id' => 894,
                'user_id' => 112,
                'photo_id' => 30,
                'body' => 'Billie Holiday hätte dazu gesagt: "Das Gewissen ist der Puls der Vernunft."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            394 => 
            array (
                'id' => 895,
                'user_id' => 170,
                'photo_id' => 91,
                'body' => 'J.R.R. Tolkien hätte dazu gesagt: "Wer mit dem Kopf durch die Wand will, holt sich nur Beulen."',
                'created_at' => '2017-09-23 07:11:23',
                'updated_at' => '2017-09-23 07:11:23',
            ),
            395 => 
            array (
                'id' => 896,
                'user_id' => 165,
                'photo_id' => 310,
                'body' => 'Billie Jean King hätte dazu gesagt: "Nur ein Tor zertrümmert den Spiegel, wenn ihm das Spiegelbild mißfällt."',
                'created_at' => '2017-09-04 01:31:33',
                'updated_at' => '2017-09-04 01:31:33',
            ),
            396 => 
            array (
                'id' => 897,
                'user_id' => 49,
                'photo_id' => 271,
                'body' => 'Anne Frank hätte dazu gesagt: "Faulheit, Frauendienst, Kränklichkeit, zu große Anhänglichkeit an den Geburtsort, Genügsamkeit und Furchtsamkeit, diese sind sechs Hindernisse der Größe."',
                'created_at' => '2017-09-16 22:35:31',
                'updated_at' => '2017-09-16 22:35:31',
            ),
            397 => 
            array (
                'id' => 898,
                'user_id' => 132,
                'photo_id' => 210,
                'body' => 'Simon Bolivar hätte dazu gesagt: "Laß euch nicht mit falschen Göttern ein!"',
                'created_at' => '2017-08-25 08:18:26',
                'updated_at' => '2017-08-25 08:18:26',
            ),
            398 => 
            array (
                'id' => 899,
                'user_id' => 149,
                'photo_id' => 554,
                'body' => 'Marie Antoinette hätte dazu gesagt: "Wer sich entschieden hat, etwas zu tun, und an nichts anderes denkt, überwindet alle Hindernisse."',
                'created_at' => '2017-09-14 23:09:49',
                'updated_at' => '2017-09-14 23:09:49',
            ),
            399 => 
            array (
                'id' => 900,
                'user_id' => 25,
                'photo_id' => 664,
                'body' => 'Christiano Ronaldo hätte dazu gesagt: "Würden die Pforten der Wahrnehmung gereinigt, erschiene den Menschen alles, wie es ist: unendlich."',
                'created_at' => '2017-09-09 12:52:19',
                'updated_at' => '2017-09-09 12:52:19',
            ),
            400 => 
            array (
                'id' => 901,
                'user_id' => 187,
                'photo_id' => 177,
                'body' => 'Emmeline Pankhurst hätte dazu gesagt: "Es gibt nicht nur einen bunten Hund in der Welt."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            401 => 
            array (
                'id' => 902,
                'user_id' => 140,
                'photo_id' => 433,
                'body' => 'Emile Zatopek hätte dazu gesagt: "Als Sklaven und Herren ihrer Eigenliebe leben die Menschen dahin, nicht um zu leben, sondern um andere glauben zu machen, sie hätten gelebt."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            402 => 
            array (
                'id' => 903,
                'user_id' => 54,
                'photo_id' => 432,
                'body' => 'Lech Walesa hätte dazu gesagt: "Du lebst nicht für dich allein auf Erden."',
                'created_at' => '2017-09-12 13:57:58',
                'updated_at' => '2017-09-12 13:57:58',
            ),
            403 => 
            array (
                'id' => 904,
                'user_id' => 19,
                'photo_id' => 636,
                'body' => 'Marilyn Monroe hätte dazu gesagt: "Was ist der Mensch, daß du seiner gedenkst?"',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            404 => 
            array (
                'id' => 905,
                'user_id' => 74,
                'photo_id' => 179,
                'body' => 'Abraham Lincoln hätte dazu gesagt: "Solange die Menschen sterben können und das Leben lieben, wird der Arzt verspottet und gut bezahlt werden."',
                'created_at' => '2017-09-20 06:53:45',
                'updated_at' => '2017-09-20 06:53:45',
            ),
            405 => 
            array (
                'id' => 906,
                'user_id' => 108,
                'photo_id' => 221,
                'body' => 'Mother Teresa hätte dazu gesagt: "Gastsein ist gut. Heimkommen ist besser."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            406 => 
            array (
                'id' => 907,
                'user_id' => 115,
                'photo_id' => 658,
                'body' => 'John F. Kennedy hätte dazu gesagt: "Wer die Vergangenheit preist, tadelt die Gegenwart."',
                'created_at' => '2017-09-14 13:01:23',
                'updated_at' => '2017-09-14 13:01:23',
            ),
            407 => 
            array (
                'id' => 908,
                'user_id' => 43,
                'photo_id' => 36,
                'body' => 'Martin Luther King hätte dazu gesagt: "Beten heißt, liebend an Jesus denken."',
                'created_at' => '2017-09-02 11:19:40',
                'updated_at' => '2017-09-02 11:19:40',
            ),
            408 => 
            array (
                'id' => 909,
                'user_id' => 122,
                'photo_id' => 175,
                'body' => 'Nelson Mandela hätte dazu gesagt: "Ich bin nicht entmutigt, weil jeder als falsch verworfene Versuch ein weiterer Schritt vorwärts ist."',
                'created_at' => '2017-09-08 05:31:20',
                'updated_at' => '2017-09-08 05:31:20',
            ),
            409 => 
            array (
                'id' => 910,
                'user_id' => 52,
                'photo_id' => 213,
                'body' => 'Winston Churchill hätte dazu gesagt: "Doppelt lebt, wer auch Vergangenes genießt."',
                'created_at' => '2017-09-10 10:45:31',
                'updated_at' => '2017-09-10 10:45:31',
            ),
            410 => 
            array (
                'id' => 911,
                'user_id' => 151,
                'photo_id' => 583,
                'body' => 'Bill Gates hätte dazu gesagt: "Der Busch hat Augen, der Baumstumpf trägt einen Hut."',
                'created_at' => '2017-09-15 09:18:33',
                'updated_at' => '2017-09-15 09:18:33',
            ),
            411 => 
            array (
                'id' => 912,
                'user_id' => 28,
                'photo_id' => 420,
                'body' => 'Muhammad Ali hätte dazu gesagt: "Die Nacht ist die Mutter von Gedanken."',
                'created_at' => '2017-09-15 00:30:40',
                'updated_at' => '2017-09-15 00:30:40',
            ),
            412 => 
            array (
                'id' => 913,
                'user_id' => 119,
                'photo_id' => 327,
                'body' => 'Mahatma Gandhi hätte dazu gesagt: "Das Leben ist eine große Gelegenheit, und es ist sehr schade, wenn der Mensch das erst zu spät erkennt."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            413 => 
            array (
                'id' => 914,
                'user_id' => 59,
                'photo_id' => 92,
                'body' => 'Margaret Thatcher hätte dazu gesagt: "Herr, ich rufe zu dir. Eile mir zur Hilfe; höre auf meine Stimme, wenn ich zu dir rufe."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            414 => 
            array (
                'id' => 915,
                'user_id' => 154,
                'photo_id' => 679,
                'body' => 'Charles de Gaulle hätte dazu gesagt: "Seit zehn Jahren versuchen viele Ostdeutsche möglichst schnell Wessis zu werden. Natürlich ohne ihre Identität dabei aufzugeben. Hundertprozentig ist das jedoch nur ganz wenigen gelungen. Aber immerhin gibt es inzwisc',
                'created_at' => '2017-09-06 19:06:44',
                'updated_at' => '2017-09-06 19:06:44',
            ),
            415 => 
            array (
                'id' => 916,
                'user_id' => 32,
                'photo_id' => 466,
                'body' => 'Christopher Columbus hätte dazu gesagt: "Verlaßt euch nicht auf Gewalt!"',
                'created_at' => '2017-09-02 22:52:25',
                'updated_at' => '2017-09-02 22:52:25',
            ),
            416 => 
            array (
                'id' => 917,
                'user_id' => 102,
                'photo_id' => 308,
                'body' => 'George Orwell hätte dazu gesagt: "Ermuntert einander mit Psalmen und Lobgesängen und geistlichen Liedern, singt und spielt dem Herrn in euren Herzen."',
                'created_at' => '2017-08-27 15:46:47',
                'updated_at' => '2017-08-27 15:46:47',
            ),
            417 => 
            array (
                'id' => 918,
                'user_id' => 2,
                'photo_id' => 323,
                'body' => 'Charles Darwin hätte dazu gesagt: "Das einzige Mittel, den Irrtum zu vermeiden, ist die Unwissenheit."',
                'created_at' => '2017-09-12 06:10:35',
                'updated_at' => '2017-09-12 06:10:35',
            ),
            418 => 
            array (
                'id' => 919,
                'user_id' => 177,
                'photo_id' => 136,
                'body' => 'Elvis Presley hätte dazu gesagt: "Willst du fremde Fehler zählen, heb an deinen an zu zählen. Ist mir recht, wird dir die Weile zu den fremden Fehlern fehlen."',
                'created_at' => '2017-09-07 11:15:44',
                'updated_at' => '2017-09-07 11:15:44',
            ),
            419 => 
            array (
                'id' => 920,
                'user_id' => 83,
                'photo_id' => 592,
                'body' => 'Albert Einstein hätte dazu gesagt: "Trau niemals einem Menschen, der sich die Haare färbt. Er färbt auch seine Gefühle."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            420 => 
            array (
                'id' => 921,
                'user_id' => 142,
                'photo_id' => 666,
                'body' => 'Paul McCartney hätte dazu gesagt: "Treibt uns der Ehrgeiz zur Einsamkeit? Die Antwort muß lauten: Ja! Denn was ist ihm mehr zuwider als Gemeinsamkeit? Was ist ihm wichtiger als Bewegungsfreiheit?"',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            421 => 
            array (
                'id' => 922,
                'user_id' => 4,
                'photo_id' => 600,
                'body' => 'Plato hätte dazu gesagt: "Was ein Leben an Länge gewinnt, verliert es meist an Tiefe."',
                'created_at' => '2017-09-09 03:53:27',
                'updated_at' => '2017-09-09 03:53:27',
            ),
            422 => 
            array (
                'id' => 923,
                'user_id' => 91,
                'photo_id' => 548,
                'body' => 'Queen Elizabeth hätte dazu gesagt: "Die Vergangenheit und die Erinnerung haben eine unendliche Kraft, und wenn auch schmerzliche Sehnsucht daraus quillt, sich ihnen hinzugeben, so liegt darin doch ein unaussprechlich süßer Genuß."',
                'created_at' => '2017-09-09 14:02:25',
                'updated_at' => '2017-09-09 14:02:25',
            ),
            423 => 
            array (
                'id' => 924,
                'user_id' => 147,
                'photo_id' => 549,
                'body' => 'Queen Victoria hätte dazu gesagt: "Im Wald lehnt sich Baum an Baum, also warum nicht Mensch an Mensch?"',
                'created_at' => '2017-09-12 19:45:51',
                'updated_at' => '2017-09-12 19:45:51',
            ),
            424 => 
            array (
                'id' => 925,
                'user_id' => 54,
                'photo_id' => 593,
                'body' => 'John M Keynes hätte dazu gesagt: "Nur der, der gar nichts tut, macht einen Fehler."',
                'created_at' => '2017-09-07 05:40:26',
                'updated_at' => '2017-09-07 05:40:26',
            ),
            425 => 
            array (
                'id' => 926,
                'user_id' => 164,
                'photo_id' => 122,
                'body' => 'Mikhail Gorbachev hätte dazu gesagt: "Wer sich getroffen fühlt, ist gemeint."',
                'created_at' => '2017-09-09 14:09:29',
                'updated_at' => '2017-09-09 14:09:29',
            ),
            426 => 
            array (
                'id' => 927,
                'user_id' => 135,
                'photo_id' => 76,
                'body' => 'Jawaharlal Nehru hätte dazu gesagt: "70% aller Zitate werden im Internet falsch zugeordnet."',
                'created_at' => '2017-09-07 04:04:51',
                'updated_at' => '2017-09-07 04:04:51',
            ),
            427 => 
            array (
                'id' => 928,
                'user_id' => 31,
                'photo_id' => 108,
                'body' => 'Leonardo da Vinci hätte dazu gesagt: "Bin, der mich sagen hört, »umsonst« – heißt »gratis«, doch auch »vergeblich« –, Gnade wie Nichtigkeit gleichermaßen."',
                'created_at' => '2017-09-13 06:23:35',
                'updated_at' => '2017-09-13 06:23:35',
            ),
            428 => 
            array (
                'id' => 929,
                'user_id' => 119,
                'photo_id' => 572,
                'body' => 'Louis Pasteur hätte dazu gesagt: "Sein Leid in sich fressen."',
                'created_at' => '2017-09-03 18:51:19',
                'updated_at' => '2017-09-03 18:51:19',
            ),
            429 => 
            array (
                'id' => 930,
                'user_id' => 17,
                'photo_id' => 206,
                'body' => 'Leo Tolstoy hätte dazu gesagt: "Solang ein Weib liebt, liebt es in einem fort – ein Mann hat dazwischen zu tun."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            430 => 
            array (
                'id' => 931,
                'user_id' => 15,
                'photo_id' => 360,
                'body' => 'Pablo Picasso hätte dazu gesagt: "Mit Fristgeben gedeiht der Handel."',
                'created_at' => '2017-09-21 17:27:31',
                'updated_at' => '2017-09-21 17:27:31',
            ),
            431 => 
            array (
                'id' => 932,
                'user_id' => 136,
                'photo_id' => 368,
                'body' => 'Vincent Van Gogh hätte dazu gesagt: "Flausen im Kopf sorgen für die Federung des Denkapparates."',
                'created_at' => '2017-08-27 00:44:35',
                'updated_at' => '2017-08-27 00:44:35',
            ),
            432 => 
            array (
                'id' => 933,
                'user_id' => 96,
                'photo_id' => 166,
                'body' => 'Franklin D. Roosevelt hätte dazu gesagt: "Wer sich nicht schämt, etwas nicht zu können, und sich nicht ärgert, etwas nicht zu können, der kommt voran."',
                'created_at' => '2017-09-14 08:59:27',
                'updated_at' => '2017-09-14 08:59:27',
            ),
            433 => 
            array (
                'id' => 934,
                'user_id' => 118,
                'photo_id' => 405,
                'body' => 'Pope John Paul II hätte dazu gesagt: "Werden die Eisheiligen im Hundertjährigen Eskimo-Kalender als heiße Jungs aufgeführt?"',
                'created_at' => '2017-09-08 06:51:20',
                'updated_at' => '2017-09-08 06:51:20',
            ),
            434 => 
            array (
                'id' => 935,
                'user_id' => 5,
                'photo_id' => 125,
                'body' => 'Thomas Edison hätte dazu gesagt: "Viele verabschieden sich von dieser Welt, ohne jemals etwas gesagt zu haben."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            435 => 
            array (
                'id' => 936,
                'user_id' => 170,
                'photo_id' => 589,
                'body' => 'Rosa Parks hätte dazu gesagt: "Es ist weise, das Glück wahrzunehmen, das unser Herrgott einem zuschickt."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            436 => 
            array (
                'id' => 937,
                'user_id' => 157,
                'photo_id' => 542,
                'body' => 'Aung San Suu Kyi hätte dazu gesagt: "Rache ist teuer."',
                'created_at' => '2017-09-23 07:11:24',
                'updated_at' => '2017-09-23 07:11:24',
            ),
            437 => 
            array (
                'id' => 938,
                'user_id' => 102,
                'photo_id' => 672,
                'body' => 'Lyndon Johnson hätte dazu gesagt: "Die Macht ist bei den Fröhlichen."',
                'created_at' => '2017-09-04 01:31:34',
                'updated_at' => '2017-09-04 01:31:34',
            ),
            438 => 
            array (
                'id' => 939,
                'user_id' => 84,
                'photo_id' => 441,
                'body' => 'Ludwig Beethoven hätte dazu gesagt: "Wenn du ein Geheimnis nicht bewahren willst, dann sag es einer Frau."',
                'created_at' => '2017-09-16 22:35:32',
                'updated_at' => '2017-09-16 22:35:32',
            ),
            439 => 
            array (
                'id' => 940,
                'user_id' => 160,
                'photo_id' => 173,
                'body' => 'Oprah Winfrey hätte dazu gesagt: "Wenn man nichts hat, was man liebt, muß man lieben, was man hat."',
                'created_at' => '2017-08-25 08:18:27',
                'updated_at' => '2017-08-25 08:18:27',
            ),
            440 => 
            array (
                'id' => 941,
                'user_id' => 55,
                'photo_id' => 615,
                'body' => 'Indira Gandhi hätte dazu gesagt: "Ein guter Anfang ist ein halber Erfolg."',
                'created_at' => '2017-09-14 23:09:50',
                'updated_at' => '2017-09-14 23:09:50',
            ),
            441 => 
            array (
                'id' => 942,
                'user_id' => 87,
                'photo_id' => 11,
                'body' => 'Eva Peron hätte dazu gesagt: "Popularität hat für mich immer etwas Unbehagliches."',
                'created_at' => '2017-09-09 12:52:20',
                'updated_at' => '2017-09-09 12:52:20',
            ),
            442 => 
            array (
                'id' => 943,
                'user_id' => 120,
                'photo_id' => 451,
                'body' => 'Benazir Bhutto hätte dazu gesagt: "Die Ehre ist die Poesie der Pflicht!"',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            443 => 
            array (
                'id' => 944,
                'user_id' => 171,
                'photo_id' => 517,
                'body' => 'Desmond Tutu hätte dazu gesagt: "Ein Mensch ohne Geld ist wie ein Wolf ohne Zähne."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            444 => 
            array (
                'id' => 945,
                'user_id' => 13,
                'photo_id' => 578,
                'body' => 'Dalai Lama hätte dazu gesagt: "Es ist irrelevant, wie lange sich die Dummköpfe unter dem Baum der Weisheit und Barmherzigkeit aufhalten. Für sie wird kein einziger Apfel herunter fallen."',
                'created_at' => '2017-09-12 13:57:59',
                'updated_at' => '2017-09-12 13:57:59',
            ),
            445 => 
            array (
                'id' => 946,
                'user_id' => 17,
                'photo_id' => 119,
                'body' => 'Walt Disney hätte dazu gesagt: "Christus und Moses, alle Seher und Magier waren "in der Ruhe". Martha arbeitete sich ab - Maria baute sich auf. Darum sagte Christus von Maria, sie habe das bessere Teil erwählt, da sie sich nicht zur Hausmagd erniedrigte g',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            446 => 
            array (
                'id' => 947,
                'user_id' => 127,
                'photo_id' => 218,
                'body' => 'Peter Sellers hätte dazu gesagt: "Wo du zu tadeln hast, komm und hilf!"',
                'created_at' => '2017-09-20 06:53:46',
                'updated_at' => '2017-09-20 06:53:46',
            ),
            447 => 
            array (
                'id' => 948,
                'user_id' => 119,
                'photo_id' => 36,
                'body' => 'Barack Obama hätte dazu gesagt: "Lebendig ist das Wort Gottes, kraftvoll und schärfer als jedes zweischneidige Schwert."',
                'created_at' => '2017-09-15 08:30:27',
                'updated_at' => '2017-09-15 08:30:27',
            ),
            448 => 
            array (
                'id' => 949,
                'user_id' => 140,
                'photo_id' => 407,
                'body' => 'Malcolm X hätte dazu gesagt: "Wer niemals außer sich gerät, wird niemals in sich gehen."',
                'created_at' => '2017-09-14 13:01:24',
                'updated_at' => '2017-09-14 13:01:24',
            ),
            449 => 
            array (
                'id' => 950,
                'user_id' => 74,
                'photo_id' => 286,
                'body' => 'J.K.Rowling hätte dazu gesagt: "Wer nicht läuft, gelangt nie ans Ziel!"',
                'created_at' => '2017-09-02 11:19:41',
                'updated_at' => '2017-09-02 11:19:41',
            ),
            450 => 
            array (
                'id' => 951,
                'user_id' => 116,
                'photo_id' => 341,
                'body' => 'Richard Branson hätte dazu gesagt: "Machen Sie es sich zur Aufgabe, höheren Ansprüchen zu genügen, als andere an Sie stellen."',
                'created_at' => '2017-09-08 05:31:21',
                'updated_at' => '2017-09-08 05:31:21',
            ),
            451 => 
            array (
                'id' => 952,
                'user_id' => 29,
                'photo_id' => 670,
                'body' => 'Pele hätte dazu gesagt: "Laß die anderen in Ruhe, sorge für dich selbst."',
                'created_at' => '2017-09-10 10:45:32',
                'updated_at' => '2017-09-10 10:45:32',
            ),
        ));
        
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
