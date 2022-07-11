<?php
    
    // Считает количество загрузок определённого документа
    function CountOpened($name) 
    {
        $name .= "Count.txt";
        $file = file($name);

        $count = implode("", $file);
        $count++;
        
        $myfile = fopen($name,"w");
        fputs($myfile,$count);
        
        fclose($myfile);

        return $count;
    }

    // Читает ключевые слова из текстового файла
    function Keywords()
    {
        $file = file('keywords.txt');

        foreach($file as $key => $item)
        {
            $file[$key] = explode(' ', preg_replace('~^.*?\s-\s|"|,~mu', '', $item));
        }
        return $file;
    }

    // Считает максимальное количество загрузок среди всех документов
    function MaxViews(array $countedArr)
    {
        $maxViews = 0;
        foreach ($countedArr as $count) {
            $maxViews = $count > $maxViews ? $count : $maxViews;
        }
        return $maxViews;
    }