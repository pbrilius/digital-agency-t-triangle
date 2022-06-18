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
        $config = $this->configuration;

        foreach ($pdoSelection as &$row) {
            $geotag = json_decode($row['geotag']);
            $row['latitude'] = $geotag->latitude;
            $row['longitude'] = $geotag->longitude;

            $row['dublin-distance'] = abs(round(static::EARTH_RADIUS * atan(
                sqrt(
                    pow(
                        cos($row['latitude']) * sin(abs($row['longitude'] - $config['dublin-office']['longitude'])),
                        2
                    ) +
                    pow(
                        cos($config['dublin-office']['latitude']) *
                        sin($row['latitude']) -
                        sin($config['dublin-office']['latitude']) *
                        cos($row['latitude']) *
                        cos(abs($row['longitude'] - $config['dublin-office']['longitude'])),
                        2
                    )
                ) /
                (
                    sin($config['dublin-office']['latitude']) *
                    sin($row['latitude']) +
                    cos($config['dublin-office']['latitude']) *
                    cos($row['latitude']) *
                    cos(abs($row['longitude'] - $config['dublin-office']['longitude']))
                )
            ), 2));
        }

        return $pdoSelection;
    }

    /**
     * Computes the differences filtering the concept
     *
     * @param  array $distanceCalculations distane calculations
     */
    public function computeFilter(array $distanceCalculations): void
    {
        $config = $this->configuration;

        $basicConcept = array_filter($distanceCalculations, function ($value) use ($config) {
            return $value['dublin-distance'] <= $config['filteredTarget'] ?? false;
        });

        $this->setFilteredVariables($basicConcept);
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
