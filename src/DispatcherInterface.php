<?php
namespace Elixant\Components\EventDispatcher;

/**
 * Copyright (c) 2021 Elixant Technology Ltd.
 *
 * PHP Version 7
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is furnished
 * to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package         elixant-technology/event-dispatcher
 * @copyright       2021 (c) Elixant Technology Ltd.
 * @author          Alexander M. Schmautz <president@elixant-technology.com>
 * @license         http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version         Release: @package_version@
 */
use Closure;
use Psr\EventDispatcher\EventDispatcherInterface;

/**
 * Event Dispatcher
 *
 * @package     elixant/platform
 * @subpackage  DispatcherInterface
 * @copyright   2021 (c) Elixant Technology Ltd.
 * @author      Alexander M. Schmautz <corporate@elixant-technology.com>
 */
interface DispatcherInterface extends EventDispatcherInterface
{
    /**
     * Register an event listener with the dispatcher.
     *
     * @param  Closure|string|array  $events
     * @param  Closure|string|null  $listener
     *
     * @return void
     */
    public function listen($events, $listener = null);

    /**
     * Determine if a given event has listeners.
     *
     * @param  string  $eventName
     *
     * @return bool
     */
    public function hasListeners($eventName);

    /**
     * Register an event subscriber with the dispatcher.
     *
     * @param  object|string  $subscriber
     *
     * @return void
     */
    public function subscribe($subscriber);

    /**
     * Dispatch an event until the first non-null response is returned.
     *
     * @param  string|object  $event
     * @param  mixed  $payload
     *
     * @return array|null
     */
    public function until($event, $payload = []);

    /**
     * Dispatch an event and call the listeners.
     *
     * @param  string|object  $event
     * @param  mixed  $payload
     * @param  bool  $halt
     *
     * @return array|null
     */
    public function dispatch($event, $payload = [], $halt = false);

    /**
     * Remove a set of listeners from the dispatcher.
     *
     * @param  string  $event
     *
     * @return void
     */
    public function forget($event);
}