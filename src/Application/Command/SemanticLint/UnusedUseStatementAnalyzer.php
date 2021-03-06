<?php

namespace PhpIntegrator\Application\Command\SemanticLint;

use PhpIntegrator\DocParser;
use PhpIntegrator\TypeAnalyzer;

/**
 * Looks for unused use statements.
 */
class UnusedUseStatementAnalyzer implements AnalyzerInterface
{
    /**
     * @var Visitor\ClassUsageFetchingVisitor
     */
    protected $classUsageFetchingVisitor;

    /**
     * @var Visitor\UseStatementFetchingVisitor
     */
    protected $useStatementFetchingVisitor;

    /**
     * @var Visitor\DocblockClassUsageFetchingVisitor
     */
    protected $docblockClassUsageFetchingVisitor;

    /**
     * Constructor.
     *
     * @param TypeAnalyzer $typeAnalyzer
     * @param DocParser    $docParser
     */
    public function __construct(TypeAnalyzer $typeAnalyzer, DocParser $docParser)
    {
        $this->classUsageFetchingVisitor = new Visitor\ClassUsageFetchingVisitor();
        $this->useStatementFetchingVisitor = new Visitor\UseStatementFetchingVisitor();
        $this->docblockClassUsageFetchingVisitor = new Visitor\DocblockClassUsageFetchingVisitor($typeAnalyzer, $docParser);
    }

    /**
     * @inheritDoc
     */
    public function getVisitors()
    {
        return [
            $this->classUsageFetchingVisitor,
            $this->useStatementFetchingVisitor,
            $this->docblockClassUsageFetchingVisitor
        ];
    }

    /**
     * @inheritDoc
     */
    public function getOutput()
    {
        // Cross-reference the found class names against the class map.
        $unknownClasses = [];
        $namespaces = $this->useStatementFetchingVisitor->getNamespaces();

        $classUsage = array_merge(
            $this->classUsageFetchingVisitor->getClassUsageList(),
            $this->docblockClassUsageFetchingVisitor->getClassUsageList()
        );

        foreach ($classUsage as $classUsage) {
            $relevantAlias = $classUsage['firstPart'];

            if (!$classUsage['isFullyQualified'] && isset($namespaces[$classUsage['namespace']]['useStatements'][$relevantAlias])) {
                // Mark the accompanying used statement, if any, as used.
                $namespaces[$classUsage['namespace']]['useStatements'][$relevantAlias]['used'] = true;
            }
        }

        $unusedUseStatements = [];

        foreach ($namespaces as $namespace => $namespaceData) {
            $useStatementMap = $namespaceData['useStatements'];

            foreach ($useStatementMap as $alias => $data) {
                if (!array_key_exists('used', $data) || !$data['used']) {
                    $unusedUseStatements[] = $data;
                }
            }
        }

        return $unusedUseStatements;
    }
}
