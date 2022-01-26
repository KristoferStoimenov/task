<?php
namespace Coniq\Tools\CoffeeBreak\Controller;

use Coniq\Tools\CoffeeBreak\Repository\CoffeeBreakPreferenceRepository;
use Coniq\Tools\CoffeeBreak\Repository\StaffMemberRepository;
use Coniq\Tools\CoffeeBreak\Services\EmailNotifier;
use Symfony\Component\HttpFoundation\Response;

class CoffeeBreakPreferenceController
{
    private $repository;
    private $staffMemberRepository;
    private $notifier;

    public function __construct()
    {
        $this->repository = new CoffeeBreakPreferenceRepository();
        $this->staffMemberRepository = new StaffMemberRepository();
        $this->notifier = new EmailNotifier();
    }

    /**
     * Publishes the list of preferences in the requested format
     */
    public function todayAction($format = "html")
    {
        $t = $this->repository->getPreferencesForToday();

        $formattedPreferences = [];
        $contentType = "text/html";

        switch ($format) {
            case "json":
                $responseContent = $this->getJsonForResponse($t);
                $contentType = "application/json";
                break;

            case "xml":
                $responseContent = $this->getXmlForResponse($t);
                $contentType = "text/xml";
                break;

            default:
                $formattedPreferences[] = $this->getHtmlForResponse($t);
        }

        return new Response($responseContent, 200, ['Content-Type' => $contentType]);
    }

    /**
     * @param int $staffMemberId
     * @return Response
     */
    public function notifyStaffMemberAction($staffMemberId)
    {
        $staffMember = $this->staffMemberRepository->find($staffMemberId);
        $p = $this->repository->getPreferenceFor($staffMemberId, new \DateTime());

        $notificationSent = $this->notifier->notifyStaffMember($staffMember, $p);

        return new Response($notificationSent ? "OK" : "NOT OK", 200);
    }

    private function getJsonForResponse(array $preferences)
    {
        return json_encode([
            "preferences" => array_map(
                function ($preference) {
                    return $preference->getAsArray();
                },
                $preferences
            )
        ]);
    }

    private function getXmlForResponse(array $preferences)
    {
        $preferencesNode = new \SimpleXMLElement("preferences");
        foreach ($preferences as $preference) {
            $preferencesNode->addChild($preference->getAsXmlNode());
        }

        return $preferencesNode->asXML();
    }

    private function getHtmlForResponse(array $preferences)
    {
        $html = "<ul>";
        foreach ($preferences as $preference) {
            $html .= $preference->getAsListElement();
        }
        $html .= "</ul>";
        return $html;
    }
}
