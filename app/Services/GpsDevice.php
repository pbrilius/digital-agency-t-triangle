<?php

namespace App\Services;

class GpsDevice
{
    const EARTH_RADIUS = 6371.009;
    /**
     * Filtered computation graphics data
     * @var array
     */
    private $filteredVariables = [];

    /**
     * Configuration array
     *
     * @var array
     */
    private $configuration = [];

    /**
     * Constructor
     * @param array $configuration  Configuration array
     */
    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Calculates the geolocation GPS based differences
     * @param  array $pdoSelection               tabular PDO data
     * @return array               Locations enriched data
     */
    public function calculateDistances(array $pdoSelection): array
    {
        return [];
    }

    /**
     * Computes the differences filtering the concept
     *
     * @param  array $distanceCalculations distane calculations
     */
    public function computeFilter(array $distanceCalculations): void
    {
        $this->setFilteredVariables([]);
    }

    /**
     * Get the value of Filtered computation graphics data
     *
     * @return array
     */
    public function getFilteredVariables()
    {
        return $this->filteredVariables;
    }

    /**
     * Set the value of Filtered computation graphics data
     *
     * @param array $filteredVariables
     *
     * @return self
     */
    public function setFilteredVariables(array $filteredVariables)
    {
        $this->filteredVariables = $filteredVariables;

        return $this;
    }
}

 ?>
