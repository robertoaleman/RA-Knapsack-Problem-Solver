<?php

class Knapsack {
    private $capacity;  // Capacidad máxima de la mochila
    private $weights;   // Array de pesos de los ítems
    private $values;    // Array de valores de los ítems
    private $n;         // Número de ítems

    /**
     * Constructor de la clase
     * @param int $capacity Capacidad máxima de la mochila
     * @param array $weights Array de pesos
     * @param array $values Array de valores
     */
    public function __construct(int $capacity, array $weights, array $values) {
        if (count($weights) !== count($values)) {
            throw new Exception("The weight and value arrays must have the same length.!!");
        }

        $this->capacity = $capacity;
        $this->weights = $weights;
        $this->values = $values;
        $this->n = count($weights);
    }

    /**
     * Resuelve el problema de la mochila usando programación dinámica
     * @return array Resultado con valor máximo y ítems seleccionados
     */
    public function solve(): array {
        // Crear matriz para programación dinámica
        $dp = array_fill(0, $this->n + 1, array_fill(0, $this->capacity + 1, 0));
        $selected = array_fill(0, $this->n, false);

        // Llenar la matriz
        for ($i = 1; $i <= $this->n; $i++) {
            for ($w = 0; $w <= $this->capacity; $w++) {
                if ($this->weights[$i-1] <= $w) {
                    $dp[$i][$w] = max(
                        $this->values[$i-1] + $dp[$i-1][$w - $this->weights[$i-1]],
                        $dp[$i-1][$w]
                    );
                } else {
                    $dp[$i][$w] = $dp[$i-1][$w];
                }
            }
        }

        // Reconstruir la solución
        $w = $this->capacity;
        for ($i = $this->n; $i > 0 && $w > 0; $i--) {
            if ($dp[$i][$w] != $dp[$i-1][$w]) {
                $selected[$i-1] = true;
                $w -= $this->weights[$i-1];
            }
        }

        return [
            'maxValue' => $dp[$this->n][$this->capacity],
            'selectedItems' => $selected
        ];
    }

    /**
     * Método para mostrar los resultados de forma legible
     * @param array $result Resultado del método solve()
     * @return string
     */
    public function formatResult(array $result): string {
        $output = "Valor máximo: " . $result['maxValue'] . "\n";
        $output .= "Ítems seleccionados:\n";

        foreach ($result['selectedItems'] as $index => $isSelected) {
            if ($isSelected) {
                $output .= "Ítem " . $index . ": Peso = " . $this->weights[$index] .
                          ", Valor = " . $this->values[$index] . "\n";
            }
        }

        return $output;
    }
}



?>